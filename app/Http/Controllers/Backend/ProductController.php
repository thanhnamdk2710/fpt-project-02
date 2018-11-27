<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Color;
use App\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return view('backend.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereStatus(1)->get();
        $colors = Color::all();
        $sizes = Size::all();

        return view('backend.products.create', [
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'price', 'sizes', 'colors', 'images', 'note', 'category');
        $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required',
            'sizes' => 'required',
            'colors' => 'required',
            'images' => 'required',
            'images.*' => 'image',
            'note' => 'required',
        ]);

        $product = new Product;
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->note = $data['note'];
        $product->category_id = $data['category'];
        $product->save();

        if(isset($data['sizes']))
        {
            foreach($data['sizes'] as $size)
            {
                $product->sizes()->attach($size);
            }
        }

        if(isset($data['colors']))
        {
            foreach($data['colors'] as $color)
            {
                $product->colors()->attach($color);
            }
        }

        if(isset($data['images']))
        {
            foreach($data['images'] as $key => $image)
            {
                $extension = strtolower($image->getClientOriginalExtension());
                $imageName = $key . time() . '.' . $extension;
                $image->move('images/products/', $imageName);

                $product->images()->create(['url' => $imageName]);
            }
        }

        return redirect(route('products.index'))->with('success', 'Add New Product Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::whereStatus(1)->get();
        $colors = Color::all();
        $sizes = Size::all();

        $data = $product->sizes->pluck('id')->toArray();

        return view('backend.products.edit', [
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('name', 'price', 'status', 'sizes', 'colors', 'images', 'note', 'category');
        $request->validate([
            'images.*' => 'image',
            'sizes' => 'required',
            'colors' => 'required',
        ]);

        $product = Product::find($id);

        if(isset($data['status']))
        {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }

        $product->name = $data['name'];
        $product->status = $data['status'];
        $product->price = $data['price'];
        $product->note = $data['note'];
        $product->category_id = $data['category'];
        $product->save();

        if(isset($data['sizes']))
        {
            $product->sizes()->detach($product->sizes);

            $product->sizes()->attach($data['sizes']);
        }

        if(isset($data['colors']))
        {
            $product->colors()->detach($product->colors);

            $product->colors()->attach($data['colors']);
        }

        if(isset($data['images']))
        {
            foreach($product->images as $key => $image)
            {
                if(file_exists('images/products/' . $image->url)) {
                    unlink('images/products/' . $image->url);
                }

                $product->images()->delete($key);
            }

            foreach($data['images'] as $key => $image)
            {
                $extension = strtolower($image->getClientOriginalExtension());
                $imageName = $key . time() . '.' . $extension;
                $image->move('images/products/', $imageName);

                $product->images()->create(['url' => $imageName]);
            }
        }

        return redirect(route('products.index'))->with('success', 'Update Product Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->sizes()->detach($product->sizes);

        $product->colors()->detach($product->colors);

        foreach($product->images as $key => $image)
        {
            if(file_exists('images/products/' . $image->url)) {
                unlink('images/products/' . $image->url);
            }

            $product->images()->delete($key);
        }

        $product->delete();

        return redirect(route('products.index'))->with('success', 'Delete Product Successfully');
    }
}

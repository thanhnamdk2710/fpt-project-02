<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('backend.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'image', 'note');
        $request->validate([
            'name' => 'required|string|unique:categories',
            'image' => 'required|image'
        ]);

        $image = $request->file('image');

        if($image)
        {
            $extension = strtolower($image->getClientOriginalExtension());
            $imageName = time() . '.' . $extension;
            $image->move('images/categories/', $imageName);
            $data['image'] = $imageName;
        }

        Category::create($data);

        return redirect(route('categories.index'))->with('success', 'Add New Category Successfully');
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
        $category = Category::find($id);

        return view('backend.categories.edit', ['category' => $category]);
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
        $data = $request->only('name', 'image', 'note', 'status');
        $request->validate([
            'image' => 'image'
        ]);

        if(isset($data['status']))
        {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }

        $image = $request->file('image');

        $category = Category::find($id);

        if($image)
        {
            if($category->image){
                unlink('images/categories/' . $category->image);
            }

            $extension = strtolower($image->getClientOriginalExtension());
            $imageName = time() . '.' . $extension;
            $image->move('images/categories/', $imageName);
            $data['image'] = $imageName;
        }

        $category->update($data);

        return redirect(route('categories.index'))->with('success', 'Update Category Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if(file_exists('images/categories/' . $category->image)){
            unlink('images/categories/' . $category->image);
        }

        $category->delete();

        return redirect(route('categories.index'))->with('success', 'Delete Category Successfully');
    }
}

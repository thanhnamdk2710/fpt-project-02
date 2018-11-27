<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('backend.sliders.index', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('title', 'image', 'note');
        $request->validate([
            'title' => 'required|string',
            'note' => 'required|string',
            'image' => 'required|image'
        ]);

        $image = $request->file('image');

        if($image)
        {
            $extension = strtolower($image->getClientOriginalExtension());
            $imageName = time() . '.' . $extension;
            $image->move('images/sliders/', $imageName);
            $data['image'] = $imageName;
        }

        Slider::create($data);

        return redirect(route('sliders.index'))->with('success', 'Add New Slider Successfully');
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
        $slider = Slider::find($id);

        return view('backend.sliders.edit', ['slider' => $slider]);
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
        $data = $request->only('title', 'image', 'note', 'status');
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

        $slider = Slider::find($id);

        if($image)
        {
            if($slider->image){
                unlink('images/sliders/' . $slider->image);
            }

            $extension = strtolower($image->getClientOriginalExtension());
            $imageName = time() . '.' . $extension;
            $image->move('images/sliders/', $imageName);
            $data['image'] = $imageName;
        }

        $slider->update($data);

        return redirect(route('sliders.index'))->with('success', 'Update Slider Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        if($slider->image){
            unlink('images/sliders/' . $slider->image);
        }

        $slider->delete();

        return redirect(route('sliders.index'))->with('success', 'Delete Slider Successfully');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index')->with('sliders', $sliders);
    }

    public function show($id)
    {
        $slider = Slider::findorfail($id);
        return view('admin.sliders.show')->with('slider', $slider);
    }

    public function edit($id)
    {
        $slider = Slider::findorfail($id);
        return view('admin.sliders.edit')->with('slider', $slider);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sort' => 'required',
            'title' => 'required|max:50',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
        ]);

        $input =  $request->only('sort','title');


        $slider = Slider::find($id);

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $newImageName);
            $input['image'] = $newImageName;
        }
        $slider->update($input);
        return redirect('admin/slider')->with('success', 'slider Updated!');
    }

}

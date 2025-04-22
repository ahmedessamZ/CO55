<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\About_us;
use Illuminate\Http\Request;


class AboutUsController extends Controller
{
    public function index(){
        $abouts=About_us::all();
        return view('admin.about_us.index')->with('abouts',$abouts);
    }

    public function show($id){
        $about=About_us::findOrFail($id);
        return view('admin.about_us.show')->with('about',$about);
    }

    public function edit($id){
        $about=About_us::findOrFail($id);
        return view('admin.about_us.edit')->with('about',$about);
    }

    public function update(Request $request , $id){
        $request->validate([
            'about'=>'required|max:1000',
            'philosophy'=>'required|max:1000'
        ]);

        $inputs = $request->only('about','philosophy');

        $about = About_us::find($id);
        $about->update($inputs);
        return redirect('admin/about_us')->with('success', 'content updated!');
    }
}

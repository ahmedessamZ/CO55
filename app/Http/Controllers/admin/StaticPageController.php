<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Static_page;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function index(){
        $pages=Static_page::all();
        return view('admin.static_page.index')->with('pages',$pages);
    }

    public function show($id){
        $page = Static_page::findorfail($id);
        return view('admin.static_page.show')->with('page',$page);
    }

    public function edit($id){
        $page =Static_page::findorfail($id);
        return view('admin.static_page.edit')->with('page',$page);
    }

    public function update(Request $request,$id){
        $request->validate([
           'body'=> 'required|max:15000'
        ]);

        $inputs=$request->only('body');

        $staticPage= Static_page::find($id);
        $staticPage->update($inputs);
        return redirect('admin/static_page')->with('success', 'page updated!');

    }
}


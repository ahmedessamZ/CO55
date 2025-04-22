<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;


class LinkController extends Controller
{
    public function index()
    {
        $links = Link::all();
        return view('admin.links.index')->with('links', $links);
    }

    public function create()
    {
        return view('admin.links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:50',
            'logo' => 'required|mimes:jpg,png,jpeg,svg|max:5048'
        ]);

        $imageName = time() . '-' . $request->title . '.' . $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('images'), $imageName);

        $data = $request->only('title','body');
        $data['logo'] = $imageName;
        $link = Link::create($data);
        $link->save();



        return redirect('admin/link')->with('success', 'link added!');
    }

    public function show($id)
    {
        $link = Link::findorfail($id);
        return view('admin.links.show')->with('link', $link);
    }

    public function edit($id)
    {
        $link = Link::findorfail($id);
        return view('admin.links.edit')->with('link', $link);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:50',
            'logo' => 'mimes:jpg,png,jpeg,svg|max:5048'
        ]);

        $input = $request->only('title','body');

        $link = Link::findorfail($id);

        if ($request->hasFile('logo')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('images'), $newImageName);
            $input['logo'] = $newImageName;
        }
        $link->update($input);
        return redirect('admin/link')->with('success', 'link Updated!');
    }

    public function destroy($id){
        Link::destroy($id);
        return redirect('admin/link')->with('success','link deleted');
    }

}

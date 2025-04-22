<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\Why;
use Illuminate\Http\Request;

class WhyController extends Controller
{
    public function index()
    {
        $whys = Why::all();
        return view('admin.whys.index')->with('whys', $whys);
    }

    public function show($id)
    {
        $why = Why::findorfail($id);
        return view('admin.whys.show')->with('why', $why);
    }

    public function edit($id)
    {
        $why = Why::findorfail($id);
        return view('admin.whys.edit')->with('why', $why);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sort' => 'required',
            'title' => 'required|max:50',
            'body' => 'required|max:255',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
        ]);

        $input = $request->only('sort','title','body');

        $why = Why::find($id);

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $newImageName);
            $input['image'] = $newImageName;
        }
        $why->update($input);
        return redirect('admin/why')->with('success', 'why section Updated!');
    }

}

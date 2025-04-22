<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::paginate(6);
        return view('admin.amenities.index')->with('amenities', $amenities);
    }

    public function create()
    {
        return view('admin.amenities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:35',
            'icon' => 'required|mimes:jpg,png,jpeg,svg|max:5048'
        ]);
        $imageName = time() . '-' . $request->title . '.' . $request->icon->getClientOriginalExtension();
        $request->icon->move(public_path('images'), $imageName);

        $data = $request->only('title');
        $data['icon'] = $imageName;
        $amenity = Amenity::create($data);
        $amenity->save();


        return redirect('admin/amenity')->with('success', 'amenity added');
    }

    public function show($id)
    {
        $amenity = Amenity::findorfail($id);
        return view('admin.amenities.show')->with('amenity', $amenity);
    }

    public function edit($id)
    {
        $amenity = Amenity::findorfail($id);
        return view('admin.amenities.edit')->with('amenity', $amenity);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:35',
            'icon' => 'mimes:jpg,png,jpeg,svg|max:5048'
        ]);

        $amenity = Amenity::findorfail($id);

        $input = $request->only('title');


        if ($request->hasFile('icon')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->icon->getClientOriginalExtension();
            $request->icon->move(public_path('images'), $newImageName);
            $input['icon'] = $newImageName;
        }
        $amenity->update($input);
        return redirect('admin/amenity')->with('success', 'amenity updated');
    }

    public function destroy($id){
        Amenity::destroy($id);
        return redirect('admin/amenity')->with('success', 'amenity deleted');
    }

}


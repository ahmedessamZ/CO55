<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Location;
use App\Models\Location_logo;
use Illuminate\Http\Request;
use Termwind\Components\Li;
use Illuminate\Support\Facades\Validator;


class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index')->with('locations', $locations);
    }

    public function show($id)
    {
        $location = Location::findorfail($id);
        return view('admin.locations.show')->with('location', $location);
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2550',
            'image' => 'required|mimes:jpg,png,jpeg,svg|max:5048',
            'location' => 'required|max:255',
            'google_link' => 'required|max:1000',
            'logoFields.*.title' => 'required|max:255',
            'logoFields.*.logo' => 'required|mimes:jpg,png,jpeg,svg|max:5048',
            'moreFields' => 'required|array',
            'moreFields.*' => 'required|mimes:jpg,png,jpeg,svg|max:5048',
        ]);

        if(count($request->logoFields) > 4){
            return back()->with('fail','Location logos must be maximum 4 logos.')->withInput();
        }

        if(count($request->moreFields) > 6){
            return back()->with('fail','Location Slides must be maximum 6 Slides.')->withInput();
        }

        $imageName = time() . '-' . $request->title . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        $data = $request->only('title','body','location','google_link');
        $data['image'] = $imageName;
        $location = Location::create($data);
        $location->save();


        foreach ($request->logoFields as $key => $value) {
            $logoName = time() . '-' . $value['title'] . '.' . $value['logo']->getClientOriginalExtension();

            $logo = new Location_logo();
            $logo->logo_title = $value['title'];
            $logo->logo = $logoName;
            $logo->location_id = $location->id;
            $value['logo']->move(public_path('images'), $logoName);
            $logo->save();
        }

        foreach ($request->moreFields as $key => $value) {
            $slideName = time() . '-slide-' . $key . $request->title . '.' . $value->getClientOriginalExtension();
            $image = new Image();
            $image->slide = $slideName;
            $image->location_id = $location->id;
            $value->move(public_path('images'), $slideName);
            $image->save();
        }

        return redirect('admin/location')->with('success', 'location added!');
    }

    public function edit($id)
    {
        $location = Location::findorfail($id);
        return view('admin.locations.edit')->with('location', $location);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:35',
            'body' => 'required|max:2550',
            'location' => 'required|max:255',
            'google_link' => 'required|max:1000',
            'logoFields.*.title' => 'required|max:255',
            'logoFields.*.logo' => 'mimes:jpg,png,jpeg,svg|max:5048',
            'moreFields' => 'array',
            'moreFields.*' => 'mimes:jpg,png,jpeg,svg|max:5048',
        ]);

        if (!$request->editLogoFields[0]['title'] == null) {
            $request->validate([
                'editLogoFields.*.title' => 'required|max:255',
                'editLogoFields.*.logo' => 'required|mimes:jpg,png,jpeg,svg|max:5048',
            ]);
        }

        $location = Location::findorfail($id);

        $locationInput = $request->only('title','body','location','google_link');


        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $newImageName);
            $locationInput['image'] = $newImageName;
        }
        $location->update($locationInput);


        $logos = Location_logo::where('location_id', $location->id)->get();

        foreach ($logos as $logo) {
            if (array_key_exists('logo', $request->logoFields[$logo->id])) {
                $logoName = time() . '-' . $request->logoFields[$logo->id]['title'] . '.' . $request->logoFields[$logo->id]['logo']->getClientOriginalExtension();
                $request->logoFields[$logo->id]['logo']->move(public_path('images'), $logoName);
                $logoInput['logo'] = $logoName;
            }
            $logoInput['logo_title'] = $request->logoFields[$logo->id]['title'];
            $logo->update($logoInput);
        }

        if ($request->moreFields) {
            if (count($request->moreFields) > 6) {
                return back()->with('fail', 'Location slides must be maximum 6 slides.')->withInput();
            }
            foreach ($request->moreFields as $key => $value) {
                $slideName = time() . '-slide-' . $key . $request->title . '.' . $value->getClientOriginalExtension();
                $image = new Image();
                $image->slide = $slideName;
                $image->location_id = $location->id;
                $value->move(public_path('images'), $slideName);
                $image->save();
            }
        }
        if (!$request->editLogoFields[0]['title'] == null) {
            if (count($request->editLogoFields) > 4) {
                return back()->with('fail', 'Location logos must be maximum 4 logos.')->withInput();
            }
            foreach ($request->editLogoFields as $key => $value) {
                $logoName = time() . '-' . $value['title'] . '.' . $value['logo']->getClientOriginalExtension();
                $logo = new Location_logo();
                $logo->logo_title = $value['title'];
                $logo->logo = $logoName;
                $logo->location_id = $location->id;
                $value['logo']->move(public_path('images'), $logoName);
                $logo->save();
            }
        }
        return redirect('admin/location')->with('success', 'location updated!');
    }

    public function destroy($id)
    {
        Location::destroy($id);
        return redirect('admin/location')->with('success', 'location deleted');
    }
}





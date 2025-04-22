<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index')->with('testimonials', $testimonials);
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|max:50',
            'author_title' => 'required|max:50',
            'body' => 'required|max:2550',
            'company' => 'required|max:50',
            'company_logo' => 'required|mimes:jpg,png,jpeg,svg|max:5048'
        ]);

        $imageName = time() . '-' . $request->company . '.' . $request->company_logo->getClientOriginalExtension();
        $request->company_logo->move(public_path('images'), $imageName);

        $data = $request->only('author','author_title','body','company');
        $data['company_logo'] = $imageName;
        $testimonial = Testimonial::create($data);
        $testimonial->save();


        return redirect('admin/testimonial')->with('success', 'testimonial added!');
    }

    public function show($id)
    {
        $testimonial = Testimonial::findorfail($id);
        return view('admin.testimonials.show')->with('testimonial', $testimonial);
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findorfail($id);
        return view('admin.testimonials.edit')->with('testimonial', $testimonial);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'author' => 'required',
            'author_title' => 'required',
            'body' => 'required',
            'company' => 'required',
            'company_logo' => 'mimes:jpg,png,jpeg,svg|max:5048'
        ]);

        $input = $request->only('author','author_title','body','company');

        $testimonial = Testimonial::findorfail($id);

        if ($request->hasFile('company_logo')) {
            $newImageName = time() . '-' . $request->company . '.' . $request->company_logo->getClientOriginalExtension();
            $request->company_logo->move(public_path('images'), $newImageName);
            $input['company_logo'] = $newImageName;
        }
        $testimonial->update($input);
        return redirect('admin/testimonial')->with('success', 'testimonial Updated!');
    }

    public function destroy($id)
    {
        Testimonial::destroy($id);
        return redirect('admin/testimonial')->with('success', 'link deleted');
    }
}

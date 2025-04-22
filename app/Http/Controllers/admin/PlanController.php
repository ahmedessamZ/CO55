<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index')->with('plans', $plans);
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:35',
            'logo' => 'required|mimes:jpg,png,jpeg,svg|max:5048'
        ]);
        $imageName = time() . '-' . $request->title . '.' . $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('images'), $imageName);

        $data = $request->only('title');
        $data['logo'] = $imageName;
        $plan = Plan::create($data);
        $plan->save();

        return redirect('admin/plan')->with('success', 'plan added');
    }

    public function show($id)
    {
        $plan = Plan::findorfail($id);
        return view('admin.plans.show')->with('plan', $plan);
    }

    public function edit($id)
    {
        $plan = Plan::findorfail($id);
        return view('admin.plans.edit')->with('plan', $plan);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|max:35',
            'logo' => 'mimes:jpg,png,jpeg,svg|max:5048'
        ]);

        $plan = Plan::findorfail($id);

        $input = $request->only('title');

        if ($request->hasFile('logo')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('images'), $newImageName);
            $input['logo'] = $newImageName;
        }
        $plan->update($input);
        return redirect('admin/plan')->with('success', 'plan updated');
    }

    public function destroy($id){
        Plan::destroy($id);
        return redirect('admin/plan')->with('success', 'plan deleted');
    }

}

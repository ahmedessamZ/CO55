<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Service_logo;
use App\Models\Service_plan;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('service_plans', 'service_plans.plan' , 'service_logos')->get();
        return view('admin.services.index')->with('services', $services);
    }

    public function show($id)
    {
        $service = Service::findorfail($id);
        return view('admin.services.show')->with('service', $service);
    }

    public function create()
    {
        $plans = Plan::all();
        return view('admin.services.create')->with('plans', $plans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:35',
            'body' => 'required|max:2550',
            'image' => 'required|mimes:jpg,png,jpeg,svg|max:5048',
            'logoFields.*.title' => 'required|max:255',
            'logoFields.*.logo' => 'required|mimes:jpg,png,jpeg,svg|max:5048',
            'moreFields' => 'required|array',
            'moreFields.*' => 'required',
        ]);

        if (count($request->logoFields) > 4) {
            return back()->with('fail', 'Service logos must be maximum 4 logos.')->withInput();
        }

        if (count($request->moreFields) > 4) {
            return back()->with('fail', 'Service Plans must be maximum 4 plans.')->withInput();
        }

        $imageName = time() . '-' . $request->title . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        $data = $request->only('title','body');
        $data['image'] = $imageName;
        $service = Service::create($data);
        $service->save();


        foreach ($request->logoFields as $key => $value) {
            $logoName = time() . '-' . $value['title'] . '.' . $value['logo']->getClientOriginalExtension();
            $logo = new Service_logo();
            $logo->logo_title = $value['title'];
            $logo->logo = $logoName;
            $logo->service_id = $service->id;
            $value['logo']->move(public_path('images'), $logoName);
            $logo->save();
        }

        foreach ($request->moreFields as $key => $value) {
            $newServicePlan = new Service_plan();
            $newServicePlan->plan_id = $value;
            $newServicePlan->service_id = $service->id;
            $newServicePlan->save();
        }

        return redirect('admin/service')->with('success', 'service added!');
    }

    public function edit($id)
    {
        $plans = Plan::all();
        $service = Service::findorfail($id);
        return view('admin.services.edit')->with(['plans' => $plans, 'service' => $service]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2550',
            'logoFields.*.title' => 'required|max:255',
            'logoFields.*.logo' => 'mimes:jpg,png,jpeg,svg|max:5048',
        ]);

        if (!$request->editLogoFields[0]['title'] == null) {
            $request->validate([
                'editLogoFields.*.title' => 'required|max:255',
                'editLogoFields.*.logo' => 'required|mimes:jpg,png,jpeg,svg|max:5048',
            ]);
        }


        $service = Service::findorfail($id);

        $serviceInput = $request->only('title','body');

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $newImageName);
            $serviceInput['image'] = $newImageName;
        }

        $service->update($serviceInput);

        $logos = Service_logo::where('service_id', $service->id)->get();

        foreach ($logos as $logo) {
            if (array_key_exists('logo', $request->logoFields[$logo->id])) {
                $logoName = time() . '-' . $request->logoFields[$logo->id]['title'] . '.' . $request->logoFields[$logo->id]['logo']->getClientOriginalExtension();
                $request->logoFields[$logo->id]['logo']->move(public_path('images'), $logoName);
                $logoInput['logo'] = $logoName;
            }
            $logoInput['logo_title'] = $request->logoFields[$logo->id]['title'];
            $logo->update($logoInput);
        }


        if (!$request->moreFields[0] == null) {
            if (count($request->moreFields) > 4) {
                return back()->with('fail', 'service plans must be maximum 4 plans.')->withInput();
            }
            foreach ($request->moreFields as $key => $value) {
                $newServicePlan = new Service_plan();
                $newServicePlan->plan_id = $value;
                $newServicePlan->service_id = $service->id;
                $newServicePlan->save();
            }
        }


        if (!$request->editLogoFields[0]['title'] == null) {
            if (count($request->editLogoFields) > 4) {
                return back()->with('fail', 'service logos must be maximum 4 logos.')->withInput();
            }
            foreach ($request->editLogoFields as $key => $value) {
                $logoName = time() . '-' . $value['title'] . '.' . $value['logo']->getClientOriginalExtension();
                $logo = new Service_logo();
                $logo->logo_title = $value['title'];
                $logo->logo = $logoName;
                $logo->service_id = $service->id;
                $value['logo']->move(public_path('images'), $logoName);
                $logo->save();
            }
        }

        return redirect('admin/service')->with('success', 'service updated!');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return redirect('admin/service')->with('success', 'service deleted');
    }

}

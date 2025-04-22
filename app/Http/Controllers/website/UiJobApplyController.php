<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Job_apply;
use Illuminate\Http\Request;

class UiJobApplyController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('website.job_apply')->with('jobs',$jobs);
    }

    public function store(Request $request){
        $request->validate([
            'job_id'=> 'required',
            'name' => 'required|max:50',
            'mobile' => 'required|digits:11',
            'email' => 'required|email',
            'filee' => 'required|mimes:jpg,png,jpeg,svg,pdf,docx,xlsx,xls,pptx|max:20048'
        ]);

        $fileName = time() . '-' . $request->name . '.' . $request->filee->getClientOriginalExtension();
        $request->filee->move(public_path('images'), $fileName);
        $request->merge(["file"=>$fileName]);

        $application = Job_apply::create($request->only('name', 'mobile', 'email', 'job_id','file'));
        $application->save();
        return redirect('job-apply')->with('success','we have received your Application and we will reply via mail as soon as we can. thanks for your interest in co55');
    }
}

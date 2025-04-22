<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::all();
        return view('admin.jobs.index')->with('jobs',$jobs);
    }

    public function create(){
        return view('admin.jobs.create');
    }

    public function store(Request $request){
        $request->validate([
           'title' => 'required|max:35'
        ]);

        $job = Job::create($request->only('title'));
        $job->save();

        return redirect('admin/job')->with('success', 'title added successfully');
    }

    public function show($id){
        $job = Job::findorfail($id);
        return view('admin.jobs.show')->with('job',$job);
    }

    public function edit($id){
        $job = Job::findorfail($id);
        return view('admin.jobs.edit')->with('job',$job);
    }

    public function update(Request $request ,$id){
        $request->validate([
            'title'=>'required|max:35'
        ]);
        $inputs= $request->only('title');

        $job=Job::findorfail($id);
        $job->update($inputs);
        return redirect('admin/job')->with('success','job title updated');
    }

    public function destroy($id){
        Job::destroy($id);
        return redirect('admin/job')->with('success','job title deleted');
    }

}

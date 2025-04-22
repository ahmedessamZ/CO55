<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Job_apply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobApplyController extends Controller
{
    public function index(){
        $applications = Job_apply::all();
        return view('admin.job_apply.index')->with('applications',$applications);
    }

    public function show($id){
        $application = Job_apply::findorfail($id);
        return view('admin.job_apply.show')->with('application',$application);
    }

    public function reply($id){
        $job = Job_apply::findorfail($id);
        return view('admin.job_apply.reply')->with('job',$job);
    }

    public function replyEmail(Request $request){

        $request->validate([
            'name' => 'required|max:35',
            'email' => 'required|email',
            'body' => 'required|max:2550'
        ]);

        $body = $request->body;
        \Mail::send('job_apply.email-reply', ['body' => $body], function ($message) use ($request) {
            $message->from('co55@careers.com', 'Hr manager');
            $message->to($request->email,$request->Name)->subject('Job Application co55 reply');
        });

        return redirect('admin/job_apply')->with('success', 'replied to the Application successfully!');
    }

    public function destroy($id){
        Job_apply::destroy($id);
        return redirect('admin/job_apply')->with('success','application deleted');
    }

}




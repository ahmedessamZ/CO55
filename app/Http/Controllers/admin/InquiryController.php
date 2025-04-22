<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Location;
use App\Models\Service;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(){
        $inquires = Inquiry::all();
        return view('admin.inquiry.index')->with('inquires',$inquires);
    }

    public function show($id){
        $inquiry = Inquiry::findorfail($id);
        return view('admin.inquiry.show')->with('inquiry',$inquiry);
    }

    public function reply($id){
        $inquiry = Inquiry::findorfail($id);
        return view('admin.inquiry.reply')->with('inquiry',$inquiry);
    }

    public function replyEmail(Request $request){

        $request->validate([
            'name' => 'required|max:35',
            'email' => 'required|email',
            'body' => 'required|max:2550'
        ]);

        $body = $request->body;
        \Mail::send('inquiry.email-reply', ['body' => $body], function ($message) use ($request) {
            $message->from('co55@careers.com', 'Hr manager');
            $message->to($request->email,$request->Name)->subject('co55 Inquiry reply');
        });
        return redirect('admin/inquiry')->with('success', 'replied to the inquiry successfully!');
    }

    public function destroy($id){
        Inquiry::destroy($id);
        return redirect('admin/inquiry')->with('success','inquiry deleted');
    }

}

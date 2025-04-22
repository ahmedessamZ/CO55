<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Location;
use App\Models\Service;
use Illuminate\Http\Request;

class UiInquiryController extends Controller
{
    public function index()
    {
        return view('website.inquiry');
    }


    public function store(Request $request)
    {
        $request->validate([
            'location_id' => 'required|max:50',
            'service_id' => 'required|max:50',
            'name' => 'required|max:50',
            'mobile' => 'required|digits:11',
            'email' => 'required|email',
            'company' => 'required|max:50',
            'body' => 'required|max:5048'
        ]);


        $inquiry = Inquiry::create($request->only('location_id', 'service_id', 'name', 'mobile', 'email', 'company', 'body'));
        $inquiry->save();
        return redirect('make-an-inquiry')->with('success', 'we have received your inquiry and we will reply via mail as soon as we can. thanks for your interest in co55');
    }
}

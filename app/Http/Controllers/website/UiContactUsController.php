<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Contact_us;
use Illuminate\Http\Request;

class UiContactUsController extends Controller
{
    public function index()
    {
        return view('website.contact_us');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'mobile' => 'required|digits:11',
            'company' => 'required|max:50',
            'email' => 'required|email',
            'body' => 'required|max:2550',
        ]);

        $contact = Contact_us::create($request->only('name','mobile','company','email','body'));

        $contact->save();
        return redirect('contact-us')->with('success','we have received your message and we will reply via mail as soon as we can. thanks for contacting co55');
    }

}

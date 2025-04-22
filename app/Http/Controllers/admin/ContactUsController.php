<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact_us;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index(){
        $contacts = Contact_us::all();
        return view('admin.contact_us.index')->with('contacts',$contacts);
    }

    public function show($id){
        $contact = Contact_us::findorfail($id);
        return view('admin.contact_us.show')->with('contact',$contact);
    }

    public function reply($id){
        $contact = Contact_us::findorfail($id);
        return view('admin.contact_us.reply')->with('contact',$contact);
    }

    public function replyEmail(Request $request){
        $request->validate([
            'name' => 'required|max:35',
            'email' => 'required|email',
            'body' => 'required|max:2550'
        ]);
        $body = $request->body;
        \Mail::send('contact_us.email-reply', ['body' => $body], function ($message) use ($request) {
            $message->from('co55@example.com', 'co55');
            $message->to($request->email,$request->Name)->subject('contact us co55 reply');
        });
        return redirect('admin/contact_us')->with('success', 'replied to the email successfully!');
    }

    public function destroy($id){
        Contact_us::destroy($id);
        return redirect('admin/contact_us')->with('success','message deleted');
    }

}




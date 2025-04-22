<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faqs.index')->with('faqs', $faqs);
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'question' => 'required|max:100',
            'answer' => 'required|max:1000'
        ]);
        $faq = Faq::create($request->only('type','question','answer'));
        $faq->save();
        return redirect('admin/faqs')->with('success', 'question added');
    }

    public function show($id)
    {
        $faq = Faq::findorfail($id);
        return view('admin.faqs.show')->with('faq', $faq);
    }

    public function edit($id)
    {
        $faq = Faq::findorfail($id);
        return view('admin.faqs.edit')->with('faq', $faq);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'question' => 'required|max:100',
            'answer' => 'required|max:1000'
        ]);

        $inputs = $request->only('type','question','answer');
        $faq = Faq::findorfail($id);
        $faq->update($inputs);
        return redirect('admin/faqs')->with('success' , 'question updated');
    }

    public function destroy($id){
        Faq::destroy($id);
        return redirect('admin/faqs')->with('success','Question Deleted');
    }

}

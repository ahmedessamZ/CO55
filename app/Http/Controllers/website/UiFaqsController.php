<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class UiFaqsController extends Controller
{
    public function index(){

        $membershipQuestions = Faq::where('type', 'membership')->get();
        $generalQuestions = Faq::where('type', 'general')->get();


        return view('website.faqs')->with([
            'generalQuestions'=>$generalQuestions,
            'membershipQuestions'=>$membershipQuestions
        ]);
    }
}

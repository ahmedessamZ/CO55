<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Static_page;
use Illuminate\Http\Request;

class UiSpageController extends Controller
{
    public function terms(){
        $term = Static_page::where('title','terms-and-conditions')->get();
        return view('website.terms_and_conditions')->with('term',$term);

    }

    public function privacy(){
        $privacy = Static_page::where('title','privacy-policy')->get();
        return view('website.privacy_policy')->with('privacy',$privacy);
    }
}

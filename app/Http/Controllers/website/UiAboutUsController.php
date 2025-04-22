<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\About_us;
use Illuminate\Http\Request;

class UiAboutUsController extends Controller
{
    public function index(){
        $abouts =About_us::all();
        return view('website.about_us')->with('abouts',$abouts);
    }
}

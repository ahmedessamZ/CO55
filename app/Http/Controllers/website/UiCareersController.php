<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class UiCareersController extends Controller
{
    public function index(){
        $jobs =Job::all();
        return view('website.careers')->with('jobs',$jobs);
    }
}

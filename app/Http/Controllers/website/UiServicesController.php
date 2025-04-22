<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class UiServicesController extends Controller
{
    public function index(){
        $services = Service::with( 'service_logos')->get();
        return view('website.services')->with('services',$services);
    }
}

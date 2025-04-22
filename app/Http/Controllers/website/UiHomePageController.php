<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Service;
use App\Models\Service_plan;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Why;
use Illuminate\Http\Request;

class UiHomePageController extends Controller
{
    public function index(){
        $sliders = Slider::limit(4)->get();
        $services = Service::with('service_plans', 'service_plans.plan' , 'service_logos')->get();

        $whys = Why::limit(3)->get();
        $amenities = Amenity::limit(18)->get();
        $testimonials = Testimonial::limit(5)->get();

        return view('website.home')->with([
            'sliders'=> $sliders,
            'services'=> $services,
            'whys'=> $whys,
            'amenities'=> $amenities,
            'testimonials'=> $testimonials,
        ]);
    }
}

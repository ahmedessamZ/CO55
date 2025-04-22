<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UiLocationsController extends Controller
{
    public function locations(){
        $locations = Location::with('location_logos',)->limit(4)->get();
        return view('website.locations')->with('locations',$locations);
    }

    public function location($id){
        try
        {
            $location = Location::findorfail($id);
        }
        catch(ModelNotFoundException $e)
        {
            return redirect('locations');
        }
        return view('website.location')->with('location',$location);
    }
}

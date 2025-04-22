<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Location_logo;
use Illuminate\Http\Request;

class LocationLogoController extends Controller
{
    public function destroy($id)
    {
        Location_logo::destroy($id);
        return back()->with('success', 'logo deleted!');
    }
}

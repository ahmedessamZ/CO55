<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service_logo;
use Illuminate\Http\Request;

class serviceLogoController extends Controller
{
    public function destroy($id)
    {
        Service_logo::destroy($id);
        return back()->with('success', 'logo deleted!');
    }
}

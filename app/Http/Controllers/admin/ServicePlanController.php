<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service_plan;
use Illuminate\Http\Request;

class ServicePlanController extends Controller
{
    public function destroy($id)
    {
        Service_plan::destroy($id);
        return back()->with('success', 'plan deleted!');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function destroy($id)
    {
        Image::destroy($id);
        return back()->with('success', 'slide deleted!');
    }
}

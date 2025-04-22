<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
        'location',
        'google_link',
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }


    public function location_logos(){
        return $this->hasMany(Location_logo::class);
    }


    public function inquiries(){
        return $this->hasMany(Inquiry::class);
    }
}

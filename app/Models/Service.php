<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'body'
    ];

    public function service_logos(){
        return $this->hasMany(Service_logo::class);
    }


    public function service_plans(){
        return $this->hasMany(Service_plan::class);
    }


    public function inquiries(){
        return $this->hasMany(Inquiry::class);
    }
}

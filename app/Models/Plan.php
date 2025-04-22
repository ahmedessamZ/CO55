<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'logo'
    ];

    public function service_plans(){
        return $this->hasMany(Service_plan::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_logo extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_title',
        'logo'
    ];

    public function service(){
        return $this->belongsTo(Service::class);
    }
}

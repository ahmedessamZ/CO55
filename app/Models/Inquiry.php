<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'service_id',
        'name',
        'mobile',
        'email',
        'company',
        'body',
    ];

    public function location(){
        return $this->belongsTo(Location::class);
    }


    public function service(){
        return $this->belongsTo(Service::class);
    }
}

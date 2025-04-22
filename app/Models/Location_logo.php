<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location_logo extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_title',
        'logo'
    ];

    public function location(){
        return $this->belongsTo(Location::class);
    }
}

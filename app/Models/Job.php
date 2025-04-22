<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function job_applies(){
        return $this->hasMany(Job_apply::class);
    }
}

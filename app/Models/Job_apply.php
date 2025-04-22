<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_apply extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'file',
        'job_id',
    ];


    public function job(){
        return $this->belongsTo(Job::class);
    }
}

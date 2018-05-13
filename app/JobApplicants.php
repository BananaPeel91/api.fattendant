<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;
use App\User;

class JobApplicants extends Model
{
    protected $fillable = [
		'job_id',
		'user_id',
    ];

    public function job(){

    	$this->belongsTo(Job::class);
    }

    public function user(){

    	$this->belongsTo(User::class);
    }
}

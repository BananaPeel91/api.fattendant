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

    	return $this->belongsTo(Job::class);
    }

    public function user(){

    	return $this->belongsTo(User::class);
    }
}

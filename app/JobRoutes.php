<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;
use App\Routes;

class JobRoutes extends Model
{
    protected $fillable = [
		'job_id',
		'route_id',
    ];

    public function job(){

    	return $this->belongsTo(Job::class);
    }

    public function route(){

    	return $this->belongsTo(Routes::class);
    }
}

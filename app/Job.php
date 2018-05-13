<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Operators;
use App\Aircrafts;
use App\JobApplicants;
use App\JobRoutes;

class Job extends Model
{
    protected $fillable = [
		'operator_id',
		'aircraft_id',
		'rate',
		'start_date',
		'close_date',
    ];

    public function operator(){

    	return $this->belongsTo(Operators::class);
    }

    public function aircraft(){

    	return $this->belongsTo(Aircrafts::class);
    }

    public function applicants(){

    	return $this->hasMany(JobApplicants::class);
    }

    public function jobRoutes(){

    	return $this->hasMany(JobRoutes::class);
    }

    
}

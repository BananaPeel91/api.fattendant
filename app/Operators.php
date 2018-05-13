<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;
use App\OperatorAircrafts;
use App\OperatorUsers;

class Operators extends Model
{
    protected $fillable = [
		'name',
		'address',
		
    ];

    public function jobs(){

    	$this->hasMany(Job::class);
    }

    public function operatorAircrafts(){

    	$this->hasMany(OperatorAircrafts::class);
    }

    public function operatorUsers(){

    	$this->hasMany(OperatorUsers::class);
    }
}

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

    	return $this->hasMany(Job::class, 'operator_id');
    }

    public function aircrafts(){

    	return $this->belongsToMany(Aircrafts::class, 'operator_aircrafts', 'operator_id', 'aircraft_id');
    }

    public function operatorUsers(){

    	return $this->hasMany(OperatorUsers::class);
    }

    public static function filterOperatorById($id){
        return static::where('id', $id);
    }
}

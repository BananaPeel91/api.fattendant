<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;
use App\Manufacturers;
use App\User;

class Aircrafts extends Model
{
      protected $fillable = [
		'model',
		'manufacturer_id',
		'yom',
		'registration',
		
    ];

    public function manufacturer() {

    	return $this->belongsTo(Manufacturers::class);
    }

    public function attendants(){

    	return $this->belongsToMany(User::class, 'attendant_aircrafts', 'user_id', 'aircraft_id');
    }

    public function jobs(){

    	return $this->hasMany(Job::class);
    }
    public function operators(){

        return $this->belongsToMany(Operators::class, 'operator_aircrafts', 'operator_id', 'aircraft_id');
    }

    
}

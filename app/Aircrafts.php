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

    	return $this->belongsTo(Manufacturer::class);
    }

    public function users(){

    	return $this->hasMany(User::class);
    }

    public function jobs(){

    	return $this->hasMany(Job::class);
    }
    public function operators(){

        return $this->belongsToMany(Operators::class, 'operator_aircrafts', 'operator_id', 'aircraft_id');
    }
}

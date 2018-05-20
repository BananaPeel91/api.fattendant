<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Airports;
use App\Job;


class Routes extends Model
{
    protected $fillable = [
		'departure_date',
		'departure_time',
		'departure_airport_id',
		'arrival_airport_id',
		 ];

	public function departureAirport(){

		return $this->hasMany(Airports::class, 'id', 'departure_airport_id');
	}

	public function arrivalAirport(){

		return $this->hasMany(Airports::class, 'id', 'arrival_airport_id');
	}

	public function airports(){

		return $this->departureAirport()->union($this->arrivalAirport()->toBase());

		
	}

	public function jobs(){

		return $this->belongsToMany(Job::class, 'job_routes', 'job_id', 'route_id');
	}
}

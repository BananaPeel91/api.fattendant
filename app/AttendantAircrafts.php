<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Aircrafts;

class AttendantAircrafts extends Model
{
    protected $fillable = [
		'user_id',
		'aircraft_id',
		
    ];

    
}

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

    public function user(){

    	$this->belongsTo(User::class);
    }

    public function aircraft(){

    	$this->belongsTo(Aircrafts::class);
    }
}

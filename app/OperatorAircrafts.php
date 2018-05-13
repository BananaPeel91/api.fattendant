<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Operators;
use App\Aircrafts;

class OperatorAircrafts extends Model
{
    protected $fillable = [
		'operator_id',
		'aircraft_id',
		
    ];

    public function operator(){

    	$this->belongsTo(Operators::class);
    }

    public function aircraft(){

    	$this->belongsTo(Aircrafts::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Routes;

class Airports extends Model
{
    protected $fillable = [
		'name',
		'code',
		
    ];

       public function departureRoutes()
    {
    	return $this->belongsTo(Routes::class, 'id', 'departure_airport_id');
    }

      public function arrivalRoutes()
    {
    	return $this->belongsTo(Routes::class, 'id', 'arrival_airport_id');
    }
}

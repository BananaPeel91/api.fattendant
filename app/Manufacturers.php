<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Aircrafts;

class Manufacturers extends Model
{
    protected $fillable = [
		'name',
		
    ];

    public function aircrafts(){

    	return $this->hasMany(Aircrafts::class);
    }
}

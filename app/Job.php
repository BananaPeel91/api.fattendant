<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Operators;
use App\Aircrafts;
use App\User;
use App\Routes;

class Job extends Model
{
    protected $fillable = [
		'operator_id',
		'aircraft_id',
		'rate',
		'start_date',
		'close_date',
    ];

    public function operator(){

    	return $this->belongsTo(Operators::class);
    }

    public function aircraft(){

    	return $this->belongsTo(Aircrafts::class);
    }

    public function applicants(){

    	return $this->belongsToMany(User::class, 'job_applicants', 'job_id', 'user_id');
    }

    public function routes(){

    	return $this->belongsToMany(Routes::class, 'job_routes', 'job_id', 'route_id');
    }

    public static function filterJobById($id){

        $job = static::where('id', $id);

        return $job;
    }

    public static function findJobByOperator($operatorId){

        return static::where('operator_id', $operatorId);
    }

    
}

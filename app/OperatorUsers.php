<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Operators;
use App\User;

class OperatorUsers extends Model
{
    protected $fillable = [
		'operator_id',
		'user_id',
		
    ];

    public function operator(){

    	$this->belongsTo(Operators::class);
    }

    public function user(){

    	$this->belongsTo(User::class);
    }
}

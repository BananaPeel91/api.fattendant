<?php

namespace App\Http\Controllers;

use \App\Operators;
use \App\OperatorUsers;
use Illuminate\Http\Request;

class OperatorsController extends Controller
{
     public function index(Request $request)
    {
    	
    	return response()->json(Operators::with('aircrafts')->get());
    }

    public function show($id)
    {
    	return response()->json(Operators::filterOperatorById($id)->with('aircrafts', 'jobs')->first());
    }

    public function update(Request $request)
    {
    	OperatorUsers::create([
    		'operator_id' => request('operatorId'),
    		'user_id'     => request('userId')
    	]);

    	return response()->json('profile updated!');
    }
}

<?php

namespace App\Http\Controllers;

use \App\Operators;
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
}

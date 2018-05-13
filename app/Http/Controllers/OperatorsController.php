<?php

namespace App\Http\Controllers;

use \App\Operators;
use Illuminate\Http\Request;

class OperatorsController extends Controller
{
     public function index(Request $request)
    {
    	
    	return response()->json(Operators::all());
    }
}

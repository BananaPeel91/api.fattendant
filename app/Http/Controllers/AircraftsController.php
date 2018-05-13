<?php

namespace App\Http\Controllers;

use \App\Aircrafts;
use Illuminate\Http\Request;

class AircraftsController extends Controller
{
      public function index(Request $request)
    {
    	
    	return response()->json(Aircrafts::all());
    }
}

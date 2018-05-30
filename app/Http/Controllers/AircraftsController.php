<?php

namespace App\Http\Controllers;

use \App\Aircrafts;
use \App\User;
use Illuminate\Http\Request;

class AircraftsController extends Controller
{
      public function index(Request $request)
    {
    	
    	return response()->json(Aircrafts::all());
    }
    public function attendant(Request $request)
    {
    	$aircraft = User::find($request[0])->aircrafts()->get();

    	return response()->json($aircraft);
    }

}

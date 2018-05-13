<?php

namespace App\Http\Controllers;

use\App\Routes;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index(Request $request)
    {
    	
    	return response()->json(Routes::with('departureAirport', 'arrivalAirport')->get());
    }
}

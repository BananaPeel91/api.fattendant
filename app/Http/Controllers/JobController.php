<?php

namespace App\Http\Controllers;
use\App\Routes;
use\App\Job;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
    	
    	return response()->json(Job::with('aircraft', 'routes', 'operator', 'routes.departureAirport', 'routes.arrivalAirport', 'applicants')->get());
    }

    public function search(Request $request)
    {
    	$jobs = (new Job())->newQuery();

    	if($request->has('operatorId') && !empty($request->get('operatorId'))) {

    		 $jobs->where('operator_id', $request->get('operatorId'));
    	}

    	if($request->has('aircraftId') && !empty($request->get('aircraftId'))) {

    		 $jobs->where('aircraft_id', $request->get('aircraftId'));
    	}

    	$result = response()->json($jobs->with('aircraft', 'routes', 'operator', 'routes.departureAirport', 'routes.arrivalAirport')->get());

    	return $result;
    }

     public function show($id)
    {
    		$job = Job::filterJobById($id)->with('routes','aircraft', 'operator', 'routes.departureAirport', 'routes.arrivalAirport', 'applicants')->first();



        	
        	return response()->json($job);
        
    }
}

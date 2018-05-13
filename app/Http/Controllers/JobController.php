<?php

namespace App\Http\Controllers;
use\App\JobRoutes;
use\App\Job;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
    	
    	return response()->json(Job::with('aircraft', 'jobRoutes', 'operator')->get());
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

    	$result = response()->json($jobs->with('aircraft', 'jobRoutes', 'operator')->get());

    	return $result;
    }

     public function show($id)
    {
    		$job = Job::find($id);
        	
        	return response()->json($job);
        
    }
}

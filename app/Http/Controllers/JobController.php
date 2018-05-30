<?php

namespace App\Http\Controllers;
use\App\Routes;
use\App\Job;
use\App\JobRoutes;

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

    public function store(Request $request)
    {
    	$job = Job::Create([
    			'operator_id' => request('operator_id'),
    			'aircraft_id' => request('aircraft_id'),
    			'rate' => request('rate'),
    			'start_date' => request('start_date'),
    			'close_date' => request('close_date'),
    	]);

    	foreach(request('routes') as $routing)
    	{
    	$route = Routes::create([
    		'departure_date' => $routing['departure_date'],
    		'departure_time' => $routing['departure_time'],
    		'departure_airport_id' => $routing['departure_airport_id'],
    		'arrival_airport_id' => $routing['arrival_airport_id'],
    	]);

    	$jobRoute = JobRoutes::create([
    		'job_id' => $job->id,
    		'route_id' => $route->id,
    	]);
    }

    return response()->json($job->id);
    }
}

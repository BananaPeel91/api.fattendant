<?php

namespace App\Http\Controllers;
use\App\User;

use Illuminate\Http\Request;

class AttendantsController extends Controller
{
	public function index(){

		return response()->json(User::getAttendants()->with('aircrafts')->get());
	}

	public function show($id){

		$attendant = User::filterUserById($id)->with('aircrafts','aircrafts.manufacturer')->first();



        	
        	return response()->json($attendant);
	}
}
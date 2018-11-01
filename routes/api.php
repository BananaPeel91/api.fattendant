<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::post('logout', 'AuthController@logout');
        Route::post('user', 'AuthController@user');
        Route::post('check', 'AuthController@check');
    });
});

Route::get('/jobs', 'JobController@index');
Route::post('/jobs/search', 'JobController@search');
Route::post('/jobs/create', 'JobController@store');
Route::post('/jobs/apply', 'JobController@apply');
Route::post('/jobs/getApplicants', 'JobController@getApplicants');
Route::get('jobs/{id}', 'JobController@show');

Route::get('/attendants', 'AttendantsController@index');
Route::get('attendants/{id}', 'AttendantsController@show');


Route::get('/routes', 'RoutesController@index');

Route::get('/operators', 'OperatorsController@index');
Route::get('/operators/{id}', 'OperatorsController@show');
Route::post('/updateOperatorProfile', 'OperatorsController@update');

Route::get('/aircrafts', 'AircraftsController@index');


Route::get('/airports', 'AirportsController@index');

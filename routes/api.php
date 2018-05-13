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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/jobs', 'JobController@index');
Route::post('/jobs/search', 'JobController@search');
Route::get('jobs/{id}', 'JobController@show');

Route::get('/routes', 'RoutesController@index');

Route::get('/operators', 'OperatorsController@index');

Route::get('/aircrafts', 'AircraftsController@index');

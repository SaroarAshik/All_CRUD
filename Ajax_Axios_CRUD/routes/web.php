<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

// Route::get('/', function () {
//     return view('welcome');
// });



// Admin panel services
Route::get('/service', 'App\Http\Controllers\ServiceController@ServiceIndex');
Route::get('/getServicesData', 'App\Http\Controllers\ServiceController@getServiceData');
Route::post('/ServiceDetails', 'App\Http\Controllers\ServiceController@getServiceDetails');
Route::post('/ServiceUpdate', 'App\Http\Controllers\ServiceController@ServiceUpdate');
Route::post('/ServiceDelete', 'App\Http\Controllers\ServiceController@ServiceDelete');
Route::post('/ServiceAdd', 'App\Http\Controllers\ServiceController@ServiceAdd');


//To use the route of the previous version, [App\Http\Controllers] it has to be written every time
//This will be a problem for newer versions for route pareameters
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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/** */

Route::post('login', 'Api\\AuthController@login');
Route::resource('/users', 'Api\\UserController');
Route::resource('/sectors', 'Api\\SectorController');
Route::resource('/events', 'Api\\EventController');
Route::resource('/places', 'Api\\PlaceController');
Route::resource('/resources', 'Api\\ResourceController');
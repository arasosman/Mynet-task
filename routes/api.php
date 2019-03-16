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



Route::resource('/person', 'Api\PersonController');
Route::get('/addresses/{person_id}','Api\PersonController@addresses');
Route::get('/address/{person_id}/{id}','Api\PersonController@address');
Route::post('/address','Api\PersonController@saveAddress');
Route::get('/clear/cache','Api\PersonController@clearCache');

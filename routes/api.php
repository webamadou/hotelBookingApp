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

Route::group(['middleware' => ['jwt.auth','api-header']], function () {
    // all routes to protected resources are registered here
    /*Route::get('users/list', function(){
        $users = App\User::all();

        $response = ['success'=>true, 'data'=>$users];
        return response()->json($response, 201);
    });*/
    Route::get('hotel', 'HotelsController@index')->name('hotel_details');
    Route::put('hotel/{hotel}', 'HotelsController@update');
    Route::resource('roomtype', 'RoomTypesController');
    Route::resource('roomcapacity', 'RoomCapacitiesController');
    Route::resource('room', 'RoomsController');

});

Route::group(['middleware' => 'api-header'], function () {
    Route::post('user/login', 'UsersController@login');
    Route::post('user/register', 'UsersController@register');
});

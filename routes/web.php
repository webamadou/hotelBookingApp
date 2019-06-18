<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
//Route::view('/{path?}', 'app');

Route::prefix('dashboard')->group(function(){
    Route::resource('hotel', 'HotelsController', ['only' => ['index','edit','update']]);
    Route::resource('room', 'RoomsController');
    Route::resource('roomtype', 'RoomTypesController');
    Route::resource('roomcapacity', 'RoomCapacitiesController');
    Route::resource('price', 'PricesController');
    Route::resource('user', 'UsersController');
    Route::resource('customer', 'CustomersController');
    Route::resource('booking', 'BookingsController', ['except' => ['create','store']]);
    Route::post('search_booking', 'BookingsController@search_booking')->name('booking.search');
});


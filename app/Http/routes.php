<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('manage-hotels', 'ManageHotelsController');
//Route::resource('hotel-facility', 'HotelFacilityController');

Route::get('manage-hotels/{hotel_id}/hotel-facilities', ['uses' => 'HotelFacilityController@index', 'as' => 'hotel.facilities']);
Route::post('add-hotel-facility/{hotel_id}', ['uses' => 'HotelFacilityController@store', 'as' => 'hotel.facilities.store']);

//upload iamges
Route::get('manage-hotels/{hotel_id}/upload-images', ['uses' => 'UploadImagesController@index', 'as' => 'manage-hotels.upload-images.index']);
Route::post('add-hotel-images/{hotel_id}', ['uses' => 'UploadImagesController@store', 'as' => 'hotel.images.store']);
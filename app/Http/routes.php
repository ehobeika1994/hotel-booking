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

/** Authentication Routes **/
Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'user.login']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'user.logout']);

/** Registration Routes **/
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/** Manage Hotels **/
Route::resource('manage-hotels', 'ManageHotelsController');
//Route::resource('hotel-facility', 'HotelFacilityController');

/** Manage Hotel Facilities **/
Route::get('manage-hotels/{hotel_id}/hotel-facilities', ['uses' => 'HotelFacilityController@index', 'as' => 'hotel.facilities']);
Route::post('add-hotel-facility/{hotel_id}', ['uses' => 'HotelFacilityController@store', 'as' => 'hotel.facilities.store']);

/** Upload Images **/
Route::get('manage-hotels/{hotel_id}/upload-images', ['uses' => 'UploadImagesController@index', 'as' => 'manage-hotels.upload-images.index']);
Route::post('add-hotel-images/{hotel_id}', ['uses' => 'UploadImagesController@store', 'as' => 'hotel.images.store']);

/** Hotel Ratings **/
Route::get('manage-hotels/{hotel_id}/hotel-rating', ['uses' => 'ManageHotelsController@addHotelRating', 'as' => 'hotel.rating']);
Route::post('store-rating/{hotel_id}', ['uses' => 'ManageHotelsController@storeHotelRating', 'as' => 'hotel.rating.storeRating']);
Route::put('update-rating/{hotel_id}/update/{id}', ['uses' => 'ManageHotelsController@updateHotelRating', 'as' => 'hotel.rating.updateRating']);

/** Hotel Rooms **/
Route::get('manage-hotels/{hotel_id}/all-rooms', ['uses' => 'RoomsController@index', 'as' => 'hotel.room.index']);
Route::get('manage-hotels/{hotel_id}/add-room', ['uses' => 'RoomsController@create', 'as' => 'hotel.room.create']);
Route::post('add-room/{hotel_id}', ['uses' => 'RoomsController@store', 'as' => 'hotel.room.store']);

/** Hotel Policies **/
Route::get('manage-hotels/{hotel_id}/hotel-policies', ['uses' => 'ManageHotelsController@addHotelPolicy', 'as' => 'hotel.policy.create']);
Route::post('add-policy/{hotel_id}', ['uses' => 'ManageHotelsController@storeHotelPolicy', 'as' => 'hotel.policy.store']);
Route::put('update-policy/{hotel_id}/update/{id}', ['uses' => 'ManageHotelsController@updateHotelPolicy', 'as' => 'hotel.policy.update']);

/** Hotel Address **/
Route::get('manage-hotels/{hotel_id}/hotel-address', ['uses' => 'AddressController@create', 'as' => 'hotel.address.create']);
Route::put('update-address/{hotel_id}/update/{id}', ['uses' => 'AddressController@store', 'as' => 'hotel.address.store']);

/** Hotel Active **/
Route::put('manage-hotels/{hotel_id}/enable', ['uses' => 'ManageHotelsController@enableHotel', 'as' => 'hotel.enable']);
Route::put('manage-hotels/{hotel_id}/disable', ['uses' => 'ManageHotelsController@disableHotel', 'as' => 'hotel.disable']);

/** Manage Customer **/
Route::resource('manage-customer', 'CustomerController');
Route::get('manage-customer/{customer_id}/edit-address/', ['uses' => 'CustomerController@editAddress', 'as' => 'manage-customer.address']);
Route::put('manage-customer/{customer_id}/update/{id}', ['uses' => 'CustomerController@updateAddress', 'as' => 'manage-customer.update.address']);

/** Customers Active **/
Route::put('manage-customer/{customer_id}/enable', ['uses' => 'CustomerController@activateCustomer', 'as' => 'customer.enable']);
Route::put('manage-customer/{customer_id}/disable', ['uses' => 'CustomerController@disableCustomer', 'as' => 'customer.disable']);
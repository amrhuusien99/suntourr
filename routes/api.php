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

Route::group(['prefix' => 'v1', 'namespace' => 'api'], function(){
    
    Route::post('hotel-register', 'AuthController@hotel_register');
    Route::post('hotel-login', 'AuthController@hotel_login');
    Route::post('hotel-reset-password', 'AuthController@hotel_reset_password');
    Route::post('hotel-reset-password-save', 'AuthController@hotel_reset_password_save');

    Route::post('client-register', 'AuthController@client_register');
    Route::post('client-login', 'AuthController@client_login');
    Route::post('client-reset-password', 'AuthController@client_reset_password');
    Route::post('client-reset-password-save', 'AuthController@client_reset_password_save');

    Route::get('countries', 'MainController@countries');
    Route::get('governorates', 'MainController@governorates');
    Route::get('categories', 'MainController@categories');
    Route::get('headers', 'MainController@headers');
    Route::post('contact-us', 'MainController@contact');
    Route::get('payment-methods', 'MainController@payment_methods');
    Route::get('hotels', 'MainController@hotels');
    Route::get('hotel-rooms', 'MainController@hotel_rooms');
    Route::get('rooms', 'MainController@rooms');
    Route::get('details-room', 'MainController@details_room');
    Route::get('sections-amenities', 'MainController@sections_amenities');
    Route::get('hotel-amenities', 'MainController@hotel_amenities');
    Route::get('offers', 'MainController@offers');

    Route::group(['middleware' => 'auth:hotel-api'],function(){

        Route::get('hotel-room', 'MainController@hotel_room');
        Route::get('hotel-details', 'MainController@hotel_details');
        Route::post('hotel-edit-information', 'MainController@hotel_edit_information');

        Route::post('create-room', 'MainController@create_room');
        Route::post('edit-room', 'MainController@edit_room');
        Route::post('delete-room', 'MainController@delete_room');

        Route::post('create-section-amenity', 'MainController@create_section_amenity');
        Route::post('edit-section-amenity', 'MainController@edit_section_amenity');
        Route::post('delete-section-ameniy', 'MainController@delete_section_amenity');

        Route::post('create-amenity', 'MainController@create_amenity');
        Route::post('edit-amenity', 'MainController@edit_amenity');
        Route::post('delete-amenity', 'MainController@delete_amenity');

        Route::post('create-offer', 'MainController@create_offer');
        Route::post('edit-offer', 'MainController@edit_offer');
        Route::post('delete-offer', 'MainController@delete_offer');

        Route::post('hotel-reservations', 'MainController@hotel_reservations');
        Route::post('hotel-reting-reservation', 'MainController@hotel_reting_reservation');
        Route::post('hotel-accepted-reservation', 'MainController@hotel_accepted_reservation');
        Route::post('hotel-rejected-reservation', 'MainController@hotel_rejected_reservation');
        Route::post('hotel-complete-reservation', 'MainController@hotel_complete_reservation');

        Route::get('hotel-my-comments', 'MainController@hotel_my_comments');

    });
 
    Route::group(['middleware' => 'auth:client-api'],function(){

        Route::get('client-details', 'MainController@client_details');
        Route::post('client-edit-information', 'MainController@client_edit_information');

        Route::post('client-make-reservation', 'MainController@client_make_reservation');
        Route::get('client-my-reservation', 'MainController@client_my_reservation');
        Route::get('client-reservation-details', 'MainController@client_reservation_details');
        Route::post('client-cancel-reservation', 'MainController@client_cancel_reservation');

        Route::post('client-add-comment', 'MainController@client_add_comment');
        Route::get('client-my-comments', 'MainController@client_my_comments');
        ROute::post('client-edit-comment', 'MainController@client_edit_comment');
        ROute::post('client-delete-comment', 'MainController@client_delete_comment');

    });

});

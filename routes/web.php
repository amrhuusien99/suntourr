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

// Route::get('/', function () {
//     return view('welcome');
// });

////////////////////////////////////////////////////////////////////////// front 

Route::group(['namespace' => 'Front'],function(){

    Route::get('index', 'MainController@index')->name('index');   

});


////////////////////////////////////////////////////////////////////// control panel

Route::get('login','UsersController@login')->name('login');
Route::post('login-check', 'UsersController@login_check')->name('user-login-check');

Route::get('user-reset-password', 'UsersController@reset_password')->name('user-reset-password');
Route::post('user-reset-password-pin-code', 'UsersController@reset_password_pin_code')->name('user-reset-password-pin-code');
Route::post('user-reset-password-save', 'UsersController@reset_password_save')->name('user-reset-password-save');

Route::group(['middleware' => 'auth:web'],function(){

    Route::get('/home', 'HomeController@home')->name('home');

    Route::resource('users', 'UsersController');
    Route::get('user-my-information', 'UsersController@my_information')->name('user-my-information');
    Route::get('user-change-password', 'UsersController@change_password')->name('user-change-password');
    Route::post('user-change-password-save', 'UsersController@change_password_save')->name('user-change-password-save');

    Route::resource('hotels', 'HotelsController');
    Route::get('hotels-activate/{id}', 'HotelsController@activate')->name('hotels-activate');
    Route::get('hotels-deactivate/{id}', 'HotelsController@deactivate')->name('hotels-deactivate');
    Route::get('hotels-normal/{id}', 'HotelsController@normal')->name('hotels-normal');
    Route::get('hotels-in-page/{id}', 'HotelsController@in_page')->name('hotels-in-page');
    Route::get('hotels-popular/{id}', 'HotelsController@popular')->name('hotels-popular');
    Route::get('hotels-un-popular/{id}', 'HotelsController@un_popular')->name('hotels-un-popular');

    Route::resource('clients', 'ClientsController');
    Route::get('clients-activate/{id}', 'ClientsController@activate')->name('clients-activate');
    Route::get('clients-deactivate/{id}', 'ClientsController@deactivate')->name('clients-deactivate');

    Route::resource('categories', 'CategoriesController');
    Route::resource('countries', 'CountriesController');
    Route::resource('governorates', 'GovernoratesController');
    Route::resource('headers', 'HeadersController');
    Route::resource('rooms', 'RoomsController');
    Route::resource('offers', 'OffersController');
    Route::resource('reservations', 'ReservationsController');
    Route::resource('sections', 'SectionAmenityController');
    Route::resource('amenities', 'AmenitiesController');
    Route::resource('payment-methods', 'PaymentMethodsController');
    Route::resource('contact', 'ContactController');
    Route::resource('comments', 'CommentsController');
    Route::resource('settings', 'SettingsController');

    Route::get('user-logout', 'Auth\LogoutController@logout')->name('user-logout');
    
});
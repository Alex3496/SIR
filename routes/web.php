<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


// PUBLIC VIEWS

Route::get('/', 'PublicController@index')->name('principal');

Route::get('/aboutUs', 'PublicController@aboutUs');

Route::get('/contact', 'PublicController@contactUs');

Route::get('/faqs', 'PublicController@Faqs');

Route::get('/blog', 'PublicController@posts')->name('posts');

Route::get('/blog/{slug}', 'PublicController@post')->name('post');

Route::get('categoria/{name}', 'PublicController@postsCategories')->name('posts.categories');

Route::get('/rates-results/', 'PublicController@tariffsResults')->name('tariffsResults');

Route::get('/infomation/send', 'PublicController@sendInformation')->name('infomation.send');


//USER ROUTES

Auth::routes(['verify' => true]);

Route::namespace('User')->group(function(){

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('profile','ProfileUserController@index')->name('profile.index');

	Route::put('profile','ProfileUserController@updateProfile')->name('profile.update');

	Route::put('password','ProfileUserController@changePassword')->name('password.change');

	Route::put('company','ProfileUserController@updateCompany')->name('company.update');

	Route::get('profile/company','ProfileUserController@showCompany')->name('profile.company');

	Route::post('profile/dataset','ProfileUserController@storeDataset')->name('profile.datasetStore');

	Route::post('profile/insurance','ProfileUserController@updateInsurance')->name('profile.insuranceStore');

	Route::post('profile/avatar','ProfileUserController@updateAvatar')->name('profile.avatar');
		
		//tariffs routes
	Route::put('tariffs/available/{id}','TariffsController@available')->name('tariffs.available');

	Route::resource('tariffs','TariffsController',['except' => ['create','show']]);

	Route::get('tariffs/create/truck','TariffsController@addTruckTariff')->name('tariff.turckAdd');

	Route::get('tariffs/create/rail','TariffsController@addTrainTariff')->name('tariff.trainAdd');

	Route::get('tariffs/create/searate','TariffsController@addMaritimeTariff')->name('tariff.maritimeAdd');

	Route::get('tariffs/create/air','TariffsController@addAerialTariff')->name('tariff.aerialAdd');

		//Rutas para Equipos

	Route::resource('equipment','EquipmentController',['except' => ['show']]);

		//Rutas para Operadores

	Route::resource('operator','OperatorController',['except' => ['show','create']]);

		//Rutas para Vehiculos

	Route::resource('vehicle','VehicleController',['except' => ['show','create']]);

		//Petitions routes
	
	Route::put('petitions/available/{id}','PetitionController@available')->name('petitions.available');

	Route::resource('petitions','PetitionController',['except' => ['show','create']]);


		//Rutas para Estancias

	Route::resource('stays','StayController',['except' => ['show']]);

		//Booking routes

	Route::get('booking/{id}','BookingController@show')->name('booking.show')->middleware('auth');

	Route::get('booking/send/message','BookingController@sendMessage')->name('booking.send')->middleware('auth');

	Route::get('booking/{id}/save', 'BookingController@saveBooking')->name('booking.save')->middleware('auth');

	Route::get('booking/{id}/remove', 'BookingController@removeBooking')->name('booking.remove')->middleware('auth');

	Route::get('booking/petition/{id}', 'BookingController@showPetition')->name('booking.showPetition')->middleware('auth');

	Route::get('booking/send/message/petition','BookingController@sendMessagePetition')->name('booking.sendPetition')->middleware('auth');
});


//ADMINATRATIVE ROUTES

//     folder              route            names                      gate
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manager-area')->group(function(){

	Route::get('home','AdminController@index')->name('index');

	Route::get('profile','AdminController@showProfile')->name('profile');

	Route::put('profile','AdminController@updateProfile')->name('profile.update');

	Route::put('password','AdminController@changePassword')->name('password.change');
	
	Route::resource('posts','PostController',['except' =>'show']);

	Route::resource('categories','CategoryController',['except' =>'show']);

	Route::resource('tags','TagController',['except' =>'show']);

	Route::resource('faqs','FAQsController',['except' =>'show']);
});

// ONLY FOR ADMIN
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-only')->group(function(){
	
	Route::get('users/actives/{id}','UserController@actives')->name('users.actives');
	
	Route::get('tariffs/list','TariffsController@list')->name('tariffs.list');

	Route::get('petitions/list','PetitionsController@list')->name('petitions.list');
	
	Route::get('users/find','UserController@find')->name('users.find');

	
	Route::resource('users','UserController');


	Route::put('users/{user}/profile','UserController@updateProfiles')->name('updateProfile');

	Route::put('users/{user}/company','UserController@updateCompany')->name('updateCompany');

	Route::put('users/{user}/dataset','UserController@updateDataset')->name('updateDataset');

	Route::put('users/{user}/insurance','UserController@updateInsurance')->name('updateInsurance');

	

	Route::delete('delete-tariff/{tariff}','UserController@destroyTariff')->name('tariffs.destroy');

	Route::resource('locations','LocationController');

});
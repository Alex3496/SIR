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

	Route::post('profile/insurance','ProfileUserController@storeInsurance')->name('profile.insuranceStore');

	Route::post('profile/avatar','ProfileUserController@updateAvatar')->name('profile.avatar');
		
		//tariffs routes

	Route::resource('tariffs','TariffsController',['except' => ['create','show']]);

	Route::get('tariffs/create/truck','TariffsController@addTruckTariff')->name('tariff.turckAdd');

	Route::get('tariffs/create/train','TariffsController@addTrainTariff')->name('tariff.trainAdd');

	Route::get('tariffs/create/maritime','TariffsController@addMaritimeTariff')->name('tariff.maritimeAdd');

	Route::get('tariffs/create/aerial','TariffsController@addAerialTariff')->name('tariff.aerialAdd');
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
});

// ONLY FOR ADMIN
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:admin-only')->group(function(){

	Route::resource('users','UserController',['except' =>['show']]);

	Route::put('users/{user}/profile','UserController@updateProfiles')->name('updateProfile');

	Route::put('users/{user}/company','UserController@updateCompany')->name('updateCompany');

	Route::put('users/{user}/dataset','UserController@updateDataset')->name('updateDataset');

	Route::put('users/{user}/insurance','UserController@updateInsurance')->name('updateInsurance');

	Route::get('users/find','UserController@find')->name('users.find');

	Route::resource('locations','LocationController');

});
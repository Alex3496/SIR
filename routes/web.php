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


//USER ROUTES

Auth::routes();

Route::get('/home', 'User\HomeController@index')->name('home');

Route::get('profile','User\ProfileUserController@edit')->name('profile.edit');

Route::put('/profile/{user}','User\ProfileUserController@update')->name('profile.update');

Route::get('profile/company','User\ProfileUserController@showCompany')->name('profile.company');

Route::post('profile/company','User\ProfileUserController@storeCompany')->name('profile.companyStore');

Route::post('profile/insurance','User\ProfileUserController@storeInsurance')->name('profile.insuranceStore');

Route::post('profile/avatar','User\ProfileUserController@updateAvatar')->name('profile.avatar');
	
	//tariffs routes

Route::resource('tariffs','User\TariffsController',['except' => ['create','show']]);

Route::get('tariffs/create/truck','User\TariffsController@addTruckTariff')->name('tariff.turckAdd');

Route::get('tariffs/create/train','User\TariffsController@addTrainTariff')->name('tariff.trainAdd');

Route::get('tariffs/create/maritime','User\TariffsController@addMaritimeTariff')->name('tariff.maritimeAdd');

Route::get('tariffs/create/aerial','User\TariffsController@addAerialTariff')->name('tariff.aerialAdd');

//ADMIN ROUTES

//     folder              route            names                      gate
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manager-area')->group(function(){
	Route::get('home','AdminController@index')->name('index');
	Route::resource('/users','UserController',['except' =>['show','create','store']]);
});

/*
Route::get('/admin', function()
{
	return view('layouts.dashboardAdmin.home');

})->name('admin')->middleware('admin');*/

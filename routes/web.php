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

//Route::resource('profile','User\ProfileUserController',['except' =>['index','show','create','store','destroy']]);

//ADMIN ROUTES

//     folder              route            names
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manager-area')->group(function(){
	Route::resource('/users','UserController',['except' =>['show','create','store']]);
});

/*
Route::get('/admin', function()
{
	return view('layouts.dashboardAdmin.home');

})->name('admin')->middleware('admin');*/

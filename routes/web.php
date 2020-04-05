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

Route::get('/', 'PublicController@index');

Route::get('/aboutUs', 'PublicController@aboutUs');

Route::get('/contact', 'PublicController@contactUs');

Route::get('/faqs', 'PublicController@Faqs');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


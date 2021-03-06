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

Auth::routes();

Route::resource('/', 'HomeController');

Route::resource('store', 'StoreController');

Route::resource('orders', 'OrdersController');

Route::resource('users', 'UsersController');

Route::resource('landing_prom', 'LandingPrincipalPromotions');

Route::resource('landing', 'LandingPrincipal');

/********************************
***** upload routes *************
*********************************/

Route::get('wordpress/{image_name}', 'ImageController@showWordpress');
Route::post('wordpress/upload', 'ImageController@upload');

/********************************
***** end upload routes *********
*********************************/
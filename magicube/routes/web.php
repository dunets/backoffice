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

Route::get('/', function () {
	App::setLocale('pt');
	return view('index');
});
Route::get('/works', function () {
	App::setLocale('pt');
	return view('works');
});
Route::get('/orders', function () {
	App::setLocale('pt');
	return view('orders');
});
Route::get('/contact', function () {
	App::setLocale('pt');
	return view('contact');
});
Route::get('/budget', function () {
	App::setLocale('pt');
	return view('budget');
});


Route::get('/{locale}', function ($locale = 'pt') {
	App::setLocale(valid($locale));
	return view('index');
});
Route::get('/{locale?}/works', function ($locale = 'pt') {
	App::setLocale(valid($locale));
	return view('works');
});
Route::get('/{locale}/orders', function ($locale = 'pt') {
	App::setLocale(valid($locale));
	return view('orders');
});
Route::get('/{locale}/contact', function ($locale = 'pt') {
	App::setLocale(valid($locale));
	return view('contact');
});
Route::get('/{locale}/budget', function ($locale = 'pt') {
	App::setLocale(valid($locale));
	return view('budget');
});

Route::post('/orders', 'FormsController@orders');
Route::post('/budget', 'FormsController@orders');


function valid($locale) {
	if($locale != 'pt' && $locale != 'fr' && $locale != 'en')
		$locale = 'pt';
	return $locale;
}
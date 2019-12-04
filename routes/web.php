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

Route::get('/', 'dashboard\ArtController@index')->name('dashboard.landing');
Route::get('/art/{art}', 'dashboard\ArtController@show')->name('dashboard.art.show');
Route::post('/art/{art}', 'dashboard\ArtController@requestPurchase')->name('art.request_purchase');

Route::get('/about', 'dashboard\AboutController@index')->name('dashboard.about');
Route::get('/purchase', 'dashboard\PurchaseController@index')->name('public.purchase');
Route::get('/contact', 'dashboard\ContactController@index')->name('public.contact');
Route::get('/explore', 'dashboard\ArtController@explore')->name('dashboard.art.explore');

Auth::routes(['register' => false]);

Route::group([
	'middleware' => 'auth',
	'namespace'  => 'Dashboard',
	'prefix'     => 'dashboard',
], function () {
	Route::get('/art', 'ArtController@index')->name('dashboard.art.index');
	Route::get('/art/{art}', 'ArtController@show')->name('dashboard.art.show');
	Route::get('/art', 'ArtController@create')->name('dashboard.art.create');
	Route::post('/art', 'ArtController@store')->name('dashboard.art.store');
	Route::get('/art/{art}/edit', 'ArtController@edit')->name('dashboard.art.edit');
	Route::post('/art/{art}/update', 'ArtController@update')->name('dashboard.art.update');
	Route::delete('/art/{art}', 'ArtController@delete')->name('dashboard.art.delete');

	Route::get('/profile', 'UserController@showProfile')->name('dashboard.user.profile');
	Route::post('/profile', 'UserController@updateUser')->name('dashboard.user.update');
	Route::get('/orders', 'OrdersController@index')->name('dashboard.user.orders');
	Route::post('/orders/{order}', 'OrdersController@update')->name('dashboard.orders.update');
});

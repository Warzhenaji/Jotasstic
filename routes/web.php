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

Route::group([
	'namespace' => 'Dashboard',
], function () {

Route::get('/', 'PostController@index');
Route::get('/about', 'AboutController@index')->name('public.about');
Route::get('/purchase', 'PurchaseController@index')->name('public.purchase');
Route::get('/contact', 'ContactController@index')->name('public.contact');

Route::get('/explore', 'PostController@explore')->name('dashboard.post.explore');
Route::get('/post/{post}', 'PostController@show')->name('dashboard.posts.show');

});

Auth::routes(['register' => false]);

Route::group([
	'middleware' => 'auth',
	'namespace'  => 'Dashboard',
	'prefix'     => 'dashboard',
], function () {
	Route::get('/', 'HomeController@index')->name('dashboard.home');
	
	Route::get('/post/create', 'PostController@create')->name('dashboard.post.create');
	Route::post('/post', 'PostController@store')->name('dashboard.post.store');
	Route::get('/post/edit/{post}', 'PostController@edit')->name('dashboard.post.edit');
	Route::post('/post/edit/{post}', 'PostController@update')->name('dashboard.post.update');

	Route::get('/profile', 'UserController@showProfile')->name('dashboard.user.profile');
	Route::post('/profile', 'UserController@updateUser')->name('dashboard.user.update');
	Route::get('/orders', 'OrdersController@index')->name('dashboard.user.orders');
});

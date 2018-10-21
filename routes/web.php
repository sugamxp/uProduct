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

Route::get('/', 'ProductsController@index');

Route::resource('products', 'ProductsController');
Auth::routes();
// Route::resource('dashboard','UserController');

Route::get('/dashboard', 'DashboardController@index')->name('home');

Route::post('/products/vote', 'ProductsController@vote');
Route::post('/products/comment', 'ProductsController@comment');
Route::get('/news', 'ApiController@newsapi');
Route::post('/news/source_id', 'ApiController@newsapi');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/fetch', 'AutocompleteController@fetch')->name('fetch');


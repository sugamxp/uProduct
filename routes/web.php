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

<<<<<<< Updated upstream
Route::get('/dashboard', 'DashboardController@index')->name('home');

Route::post('/products/vote', 'ProductsController@vote');
=======
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/displayprod', 'ProductsController@displayProd');
>>>>>>> Stashed changes

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
    ///admin
    Route::get('/admin', 'Cpanel\AdminController@index')->name('admin')->where('any', '.*');
    ///categories
    Route::resource('categories', 'Cpanel\CategoriesController');

    Route::post('categories/update', 'Cpanel\CategoriesController@update');

});

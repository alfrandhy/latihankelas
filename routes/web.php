<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/beranda', function(){
    return view('index');
});
Route::get('/contact', function(){
    return view('contact');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Category Routes
Route::get('category', 'CategoryController@index')->name('category');
Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::POST('category/create', 'CategoryController@store')->name('category.store');
Route::get('category/edit/{category}', 'CategoryController@edit')->name('category.edit');
Route::PUT('category/category/{category}', 'CategoryController@Update')->name('category.update');
Route::get('category/delete/{category}', 'CategoryController@destroy')->name('category.delete');
// Route::resource('category', 'CategoryController');
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
Auth::routes();

Route::group(['prefix' => 'admin'], function() {
    Route::resource('articles', 'ArticleController');
});

Route::resource('categories', 'CategoryController');

Route::get('/', 'PublicController@index')->name('index');

Route::get('/{article}', 'PublicController@show')->name('show');

Route::get('/categories', 'CategoriesController@index')->name('categories.index');

Route::get('/category/{category}', 'CategoriesController@show')->name('categories.show');

Route::get('/home', 'HomeController@index')->name('home');

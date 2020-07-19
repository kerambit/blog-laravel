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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::resource('articles', 'ArticleController');
    Route::resource('category', 'CategoryController');
});

Route::get('/categories', 'CategoriesController@index')->name('categories.index');

Route::get('/categories/{category}', 'CategoriesController@show')->name('categories.show');

Route::get('/', 'ArticleController@index')->name('article.index');

Route::get('/articles/{article}', 'ArticleController@show')->name('article.show');

Route::get('/home', 'HomeController@index')->name('home');

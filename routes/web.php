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

Route::resource('articles', 'ArticleController')->names([
    'index' => 'articles',
    'store' => 'articles.store',
    'create' => 'articles.create',
    'show' => 'articles.show',
    'update' => 'articles.update',
    'destroy' => 'articles.destroy'
]);
Route::get('/', 'ArticleController@index')->name('index');

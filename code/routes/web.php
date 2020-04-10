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

Route::get('/', 'HomeController@main')
     ->name('home');
Route::get('/submit', 'UpdateRequestController@submitForm');
Route::post('/submit', 'UpdateRequestController@submit')
     ->name('update.submit');
Route::get('/statuses/name', 'ServiceUpdateController@searchByName')
     ->name('services.name');
Route::get('/statuses/id', 'ServiceUpdateController@getById')
     ->name('services.id');
Route::get('/publish/{id}', 'UpdateRequestController@publish')
     ->name('update.publish');

Route::get('/posts/', 'BlogController@list')
     ->name('blog.list');

Route::get('/posts/{id}', 'BlogController@index')
     ->name('blog.get');
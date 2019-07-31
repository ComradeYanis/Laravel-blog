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

Route::get('/', 'BlogController@index')->middleware('session');
Route::get('/posts/{post}', 'BlogController@post')->middleware('session');
Route::post('/posts/{post}/comment', 'BlogController@comment')->middleware('session');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('session');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::resource('/posts', 'PostController')->middleware('session');
    Route::resource('/categories', 'CategoryController', ['except' => ['show']])->middleware('session');
    Route::resource('/comments', 'CommentController', ['only' => ['index', 'destroy']])->middleware('session');
});

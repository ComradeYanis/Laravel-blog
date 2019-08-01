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
Route::get('/categories/{category}', 'BlogController@category')->middleware('session');
Route::get('/posts/{post}', 'BlogController@post')->middleware('session');
Route::post('/posts/{post}/comment', 'BlogController@commentPost')->middleware('session');
Route::post('/categories/{category}/comment', 'BlogController@commentCategory')->middleware('session');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'session'], function() {
    Route::resource('/', 'PostController');
    Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoryController', ['except' => ['show']]);
    Route::resource('/comments', 'CommentController', ['only' => ['index']]);
    Route::resource('/sessions', 'SessionController', ['only' => ['index']]);
});

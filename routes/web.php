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

Route::get('/', 'SiteController@index');
Route::get('/posts/{post}', 'SiteController@post');
Route::post('/posts/{post}/comment','SiteController@commentPost');
Route::get('/categories','SiteController@categories');
Route::get('/categories/{category}','SiteController@category');
Route::post('/categories/{category}/comment','SiteController@commentCategory');

Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function() {
    Route::resource('/', 'PostController');
    Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoryController', ['except' => ['show']]);
    Route::resource('/tags', 'TagController', ['except' => ['show']]);
    Route::resource('/comments', 'CommentController', ['only' => ['index', 'destroy']]);
    Route::resource('/users', 'UserController', ['middleware' => 'admin', 'only' => ['index', 'destroy']]);
});

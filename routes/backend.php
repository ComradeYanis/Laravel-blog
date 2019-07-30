<?php
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');
Route::resource('sessions', 'SessionController');
Route::resource('comments', 'CommentController')->only(['index', 'destroy']);

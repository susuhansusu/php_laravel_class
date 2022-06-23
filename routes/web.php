<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


Route::get('/posts', [PostController::class,'index']);

Route::get('/posts/create', [PostController::class,'create']);

Route::post('/posts/store', [PostController::class,'store']);

//Route::post('/posts', [PostController::class,'store']);

Route::get('/posts/edit/{id}', [PostController::class,'edit']);

Route::post('/posts/update/{id}', [PostController::class,'update']);

//Route::post('/posts/delete/{id}', [PostController::class,'destroy']);

//Route::delete('/posts/delete/{id}', [PostController::class,'destroy']);

Route::get('/posts/show/{id}', [PostController::class, 'show']);

//Route::resource('posts',PostController::class);

//users
Route::get('/users/create', [UserController::class,'create']);

Route::post('/users/store', [UserController::class,'store']);

Route::get('/users', [UserController::class,'index']);

Route::get('/users/edit/{id}', [UserController::class,'edit']);

Route::post('/users/update/{id}', [UserController::class,'update']);

Route::delete('/users/{id}', [UserController::class, 'delete']);


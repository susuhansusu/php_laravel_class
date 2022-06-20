<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/posts', [PostController::class,'index']);

Route::get('/posts/create', [PostController::class,'create']);

Route::post('/posts/store', [PostController::class,'store']);

//Route::post('/posts', [PostController::class,'store']);

Route::get('/posts/edit/{id}', [PostController::class,'edit']);

Route::post('/posts/update/{id}', [PostController::class,'update']);

//Route::post('/posts/delete/{id}', [PostController::class,'destroy']);

//Route::delete('/posts/delete/{id}', [PostController::class,'destroy']);

Route::get('/Post-show/{id}', [PostController::class,'show']);

//Route::resource('posts',PostController::class);

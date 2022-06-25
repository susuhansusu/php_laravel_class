<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\myAuthMiddleware;

///////////Posts
// Route::get('/posts', [PostController::class,'index']);
// Route::get('/posts/create', [PostController::class,'create'])->middleware('myauth');
// Route::post('/posts/store', [PostController::class,'store']);
// //Route::post('/posts', [PostController::class,'store']);
// Route::get('/posts/edit/{id}', [PostController::class,'edit']);
// Route::post('/posts/update/{id}', [PostController::class,'update']);
// Route::delete('/posts/{id}', [PostController::class, 'destroy']);
// Route::get('/posts/show/{id}', [PostController::class, 'show']);
// //Route::resource('posts',PostController::class);

Route::redirect('/', '/posts');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('myauth');
Route::post('/posts/store', [PostController::class,'store'])->middleware('myauth');
Route::get('/posts/edit/{id}', [PostController::class,'edit'])->middleware('myauth');
Route::post('/posts/update/{id}', [PostController::class,'update'])->middleware('myauth');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('myauth');
Route::get('/posts/show/{id}', [PostController::class, 'show']);


//////////users
Route::get('/', [UserController::class, 'index']);
Route::get('/users', [UserController::class,'index'])->middleware('myauth');
Route::get('/users/create', [UserController::class,'create'])->middleware('myauth');
Route::post('/users/store', [UserController::class,'store']);
Route::resource('users', UserController::class);
Route::get('/users/edit/{id}', [UserController::class,'edit']);
Route::post('/users/update/{id}', [UserController::class,'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);




//////////Register
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);


//////////Login
Route::get('login', [LoginController::class, 'create']);
Route::post('login', [LoginController::class, 'store']);
Route::get('logout', [LoginController::class, 'destroy']);


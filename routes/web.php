<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\UserPostController;

Route::get('/', function(){
return view('home');
})->name('home');

Route::get('/find_number', [PostController::class, 'find_total'])->name('find_number');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/user/{user:username}/posts', [UserPostController::class, 'index'])->name('user.posts');


Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/delete/{post}/posts', [PostController::class, 'destroy'])->name('delete.posts');

//Route::get('/posts.likes',[LikesController::class, 'index'])->name('posts.likes');
Route::post('/posts/{post}/likes', [LikesController::class, 'store'])->name('posts.likes');

Route::delete('/delete/{post}/likes', [LikesController::class, 'destroy'])->name('delete.likes');


Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

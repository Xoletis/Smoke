<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use \App\Http\Controllers\SessionsController;
use \App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [\App\Http\Controllers\PostCommentController::class, 'store'])->middleware('notban');
Route::put('/download/{post:slug}', [PostController::class, 'download']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::delete('/post/{post:slug}', [PostController::class, 'delete']);

Route::get('game/posts/create', [PostController::class, 'create'])->middleware('notban');
Route::post('game/posts', [PostController::class, 'store'])->middleware('auth');

Route::delete('/comment/delete/{comment:id}', [\App\Http\Controllers\CommentController::class, 'destroy'])->middleware('admin');

Route::get('user/{user:username}', [\App\Http\Controllers\UserController::class, 'getUser'])->middleware('auth');
Route::get('user/{user:username}/modify', [\App\Http\Controllers\UserController::class, 'modify'])->middleware('auth');
Route::put('/{user:username}/update', [\App\Http\Controllers\UserController::class, 'update'])->middleware('auth');
Route::get('/user', [\App\Http\Controllers\UserController::class, 'getAll'])->middleware('admin');
Route::put('/{user:username}/setAdmin', [\App\Http\Controllers\UserController::class, 'setAdmin'])->middleware('admin');
Route::put('/{user:username}/removeAdmin', [\App\Http\Controllers\UserController::class, 'removeAdmin'])->middleware('admin');
Route::put('/{user:username}/Ban', [\App\Http\Controllers\UserController::class, 'ban'])->middleware('admin');
Route::put('/{user:username}/Unban', [\App\Http\Controllers\UserController::class, 'unban'])->middleware('admin');

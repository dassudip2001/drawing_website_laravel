<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
// category routes
Route::get('category', [CategoryController::class, 'index'])
    ->middleware(['auth'])
    ->name('category.index');
Route::post('category', [CategoryController::class, 'store'])
    ->middleware(['auth'])
    ->name('category.store');
Route::get('category/{id}', [CategoryController::class, 'show'])
    ->middleware(['auth'])
    ->name('category.show');
Route::put('category/{id}', [CategoryController::class, 'update'])
    ->middleware(['auth'])
    ->name('category.update');
Route::get('category/{id}', [CategoryController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('category.destroy');

// post routes
Route::get('posts', [PostController::class, 'index'])
    ->middleware(['auth'])
    ->name('posts.index');
Route::post('posts', [PostController::class, 'create'])
    ->middleware(['auth'])
    ->name('posts.store');
Route::get('posts/{id}', [PostController::class, 'show'])
    ->middleware(['auth'])
    ->name('posts.show');
Route::put('posts/{id}', [PostController::class, 'update'])
    ->middleware(['auth'])
    ->name('posts.update');
Route::delete('posts/{id}', [PostController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('posts.destroy');
require __DIR__ . '/auth.php';

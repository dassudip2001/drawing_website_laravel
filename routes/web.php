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

// post routes
Route::get('posts', [PostController::class, 'index'])
    ->middleware(['auth'])
    ->name('posts.index');
require __DIR__ . '/auth.php';
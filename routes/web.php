<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');
// Route::
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
Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('category.destroy');

// post routes
Route::get('posts', [PostController::class, 'index'])
    ->middleware(['auth'])
    ->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])
    ->middleware(['auth'])
    ->name('posts.create');
Route::post('posts', [PostController::class, 'store'])
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
// publish and unpublish routes
Route::post('post/{id}/publish', [PostController::class, 'publish'])
    ->middleware(['auth'])
    ->name('posts.publish');
Route::post('post/{id}/unpublish', [PostController::class, 'unpublish'])
    ->middleware(['auth'])
    ->name('posts.unpublish');

// details routes
Route::get('details/{id}', [PostController::class, 'details'])
    ->middleware(['auth'])
    ->name('details.index');

// user routes
Route::get('users', [UserController::class, 'index'])
    ->middleware(['auth'])
    ->name('users.index');

// role routes
Route::get('roles', [RoleController::class, 'index'])
    ->middleware(['auth'])
    ->name('roles.index');
// permission routes
Route::get('permissions', [PermissionController::class, 'index'])
    ->middleware(['auth'])
    ->name('permissions.index');

require __DIR__ . '/auth.php';

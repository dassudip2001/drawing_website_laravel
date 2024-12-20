<?php

use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// get all categories
Route::get('categories', [ApiCategoryController::class, 'index']);

// posts
Route::get('posts', [ApiPostController::class, 'index']);

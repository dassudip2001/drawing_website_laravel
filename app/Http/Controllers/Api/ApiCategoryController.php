<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ApiCategoryController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $category = Category::with('user')->get();
        return response()->json(
            [
                'status' => 'Date fetched successfully',
                'data' => $category
            ]
        );
    }
}

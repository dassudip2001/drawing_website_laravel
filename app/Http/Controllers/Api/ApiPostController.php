<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiPostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('category', 'users')
            ->where('is_published', 0)
            ->where('user_id', $request['user_id'])
            ->get();
        return response()->json(
            [
                'status' => 'Date fetched successfully',
                'data' => $posts
            ]
        );
    }
}
// http://localhost:8000/api/posts?user_id=1
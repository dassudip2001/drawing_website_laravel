<?php

namespace App\Http\Controllers;

use App\Models\Post;

class GalleryController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $gallery
            = Post::with('category', 'users')
            ->where('is_published', 1)
            ->get();
        return view('gallery.image-gallery', compact('gallery'));
    }
}

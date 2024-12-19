<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('name', 'id')->get();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $response = cloudinary()->upload($request->file('image')->getRealPath())->getSecurePath();

        dd($response);
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'nullable|string',
        ]);

        $cloudinaryImage = $request->file('image')->storeOnCloudinary('products');
        $url = $cloudinaryImage->getSecurePath();
        $public_id = $cloudinaryImage->getPublicId();

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->id();

        try {
            // $uploadedFile = $request->file('file');
            // if (!$uploadedFile->isValid()) {
            //     return redirect()->route('post.index')->with('error', 'Invalid file upload.');
            // }

            // $uploadedFileUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
            // $post->url = $uploadedFileUrl;
            // $post->public_path = $uploadedFileUrl;

            $post->save();

            // $uploadedFile = $request->file('file');

            // if (!$uploadedFile->isValid()) {
            //     return redirect()->route('post.index')->with('error', 'Invalid file upload.');
            // }

            // // Store the file locally
            // $filePath = $uploadedFile->store('uploads', 'public'); // 'uploads' is the folder, 'public' is the disk

            // // Get the public URL
            // $fileUrl = Storage::url($filePath);

            // $post->url = $fileUrl;
            // $post->public_path = $filePath;

            // $post->save();

            return redirect()->route('post.index')->with('success', 'Post created successfully');
        } catch (\Exception $e) {
            return redirect()->route('post.index')->with('error', 'Post not created. ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

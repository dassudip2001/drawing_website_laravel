<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('users')
            ->where('user_id', auth()->id())
            ->get();


        // find all posts login user

        // foreach ($posts as $post) {
        //     $post->public_path = Cloudinary::getUrl($post->public_path, ['width' => 276, 'height' => 276, 'crop' => 'fill']);
        // }
        return view('post.index', compact('posts'));
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

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            // 'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'nullable|string',
            'imageUrls' => 'nullable|string',
        ]);



        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;

        $post->accession_number = auth()->user()->name . '-' . substr(md5(time()), 0, 4)  . '-' . rand(1000, 9999);
        $post->category_id = $request->category_id;
        $post->url = $request->imageUrls;
        $post->public_path = $request->imageUrls;
        $post->user_id = auth()->id();

        try {
            // $uploadedFile = $request->file('image');
            // if (!$uploadedFile->isValid()) {
            //     return redirect()->route('posts.index')->with('error', 'Invalid file upload.');
            // }

            // $uploadedFileUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
            // $post->url = $uploadedFileUrl;
            // $post->public_path = $uploadedFileUrl;

            $post->save();


            flash()
                ->options([
                    'timeout' => 3000,
                    'position' => 'bottom-right',
                ])
                ->success('Record Created successfully');
            return redirect()->route('posts.index');
        } catch (\Exception $e) {
            return redirect()->route('posts.index')->with('error', 'Post not created. ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $categories = Category::select('name', 'id')->get();
        $post = Post::with('category', 'users')->find($id);
        return view('post.edit', compact('categories', 'post'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'public_path' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->url = $request->public_path;
        $post->public_path = $request->public_path;

        try {
            // if ($request->hasFile('image')) {
            //     $uploadedFile = $request->file('image');
            //     if (!$uploadedFile->isValid()) {
            //         return redirect()->route('posts.index')->with('error', 'Invalid file upload.');
            //     }

            //     $uploadedFileUrl = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();
            //     $post->url = $uploadedFileUrl;
            //     $post->public_path = $uploadedFileUrl;
            // }

            $post->save();
            flash()
                ->options([
                    'timeout' => 3000,
                    'position' => 'bottom-right',
                ])
                ->success('Record Created successfully');
            return redirect()->route('posts.index');
        } catch (\Exception $e) {
            return redirect()->route('posts.index')->with('error', 'Post not updated. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $post = Post::find($id);
            $post->delete();
            flash()
                ->options([
                    'timeout' => 3000,
                    'position' => 'bottom-right',
                ])
                ->success('Record Delted successfully');
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // post details
    public function details($id)
    {
        $post = Post::find($id);
        return view('post.view', compact('post'));
    }

    // publish post
    public function publish(int $id)
    {
        try {
            $post = Post::find($id);
            $post->is_published = true;
            $post->published_at = now();
            $post->save();
            flash()
                ->options([
                    'timeout' => 3000,
                    'position' => 'bottom-right',
                ])
                ->success('Record Published successfully');
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // unpublish post
    public function unpublish(int $id)
    {
        try {
            $post = Post::find($id);
            $post->is_published = false;
            $post->published_at = null;
            $post->save();
            flash()
                ->options([
                    'timeout' => 3000,
                    'position' => 'bottom-right',
                ])
                ->success('Record Unpublished successfully');
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    // if user want to like post
    //  1. check if user already liked the post
    //  2. if not liked, then like the post
    //  3. if liked, then unlike the post
    public function like(int $id)
    {
        $post = Post::find($id);
        $user = auth()->user();
        if ($post->likes->contains($user)) {
            $post->likes()->detach($user);
            return redirect()->route('posts.index')->with('success', 'Post unliked successfully');
        } else {
            $post->likes()->attach($user);
            return redirect()->route('posts.index')->with('success', 'Post liked successfully');
        }
    }
}

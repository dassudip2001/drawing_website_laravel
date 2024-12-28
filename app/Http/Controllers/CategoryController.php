<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('role_or_permission:Department access|Department create|Department edit|Department delete', ['only' => ['index', 'show']]);
    //     $this->middleware('role_or_permission:Department create', ['only' => ['create', 'store']]);
    //     $this->middleware('role_or_permission:Department edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('role_or_permission:Department delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index');
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $request->validated();
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->user_id = auth()->user()->id;

        try {
            $category->save();
            flash()
                ->options([
                    'timeout' => 3000,
                    'position' => 'bottom-right',
                ])
                ->success('Category created successfully.');
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $request->validated();
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        // $category->user_id = auth()->user()->id;

        try {
            $category->save();
            flash()
                ->options([
                    'timeout' => 3000,
                    'position' => 'bottom-right',
                ])
                ->success('Category updated successfully.');
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            flash()
                ->options([
                    'timeout' => 3000,
                    'position' => 'bottom-right',
                ])
                ->success('Category deleted successfully.');
            return redirect()->route('category.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

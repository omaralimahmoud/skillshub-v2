<?php

namespace App\Http\Controllers\Website\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->with('skills')->get();

        //   dd($categories);
        return CategoryResource::collection($categories);

    }

    public function show(Category $category)
    {
        $category = $category->load('skills');

        return CategoryResource::make($category);
    }
}

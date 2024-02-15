<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {

        $categories = Category::select('id', 'name')->withCount('skills')->get();

        $skills = $category->skills()->paginate(6);
        //dd($skills);

        return view('website.pages.categories.show', [
            'category' => $category,
            'categories' => $categories,
            'skills' => $skills,
        ]);
    }
}

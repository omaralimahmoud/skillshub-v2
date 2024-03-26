<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): View
    {

        $categories = Category::select('id', 'name')->active()->withCount('skills')->get();

        $skills = $category->skills()->active()->with('exams.users')->paginate(6);

        return view('website.pages.categories.show', [
            'category' => $category,
            'categories' => $categories,
            'skills' => $skills,
        ]);
    }
}

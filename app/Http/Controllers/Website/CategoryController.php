<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show($id)
    {
        return view('website.pages.category.show');
    }
}
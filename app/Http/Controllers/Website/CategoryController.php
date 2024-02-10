<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show()
    {

        return view('website.pages.categories.show');
    }
}

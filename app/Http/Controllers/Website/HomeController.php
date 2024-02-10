<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        return view(
            'website.pages.home.index'
        );
    }
}

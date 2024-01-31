<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        //dd(__('website.navbar'));

        return view('website.pages.home.index');
    }
}

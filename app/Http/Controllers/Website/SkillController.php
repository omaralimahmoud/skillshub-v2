<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    public function show($id)
    {
        return view('website.pages.skills.show');
    }
}

<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    public function index()
    {
        $exams = Auth::user()->exams;

        //  dd($exams);
        return view('website.pages.profile.index', [
            'exams' => $exams,
        ]);
    }
}

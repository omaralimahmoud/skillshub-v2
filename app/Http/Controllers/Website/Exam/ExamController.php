<?php

namespace App\Http\Controllers\Website\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Contracts\View\View;

class ExamController extends Controller
{
    public function show(Exam $exam): View
    {
        //dd($exam);

        return view('website.pages.exams.show');
    }
}

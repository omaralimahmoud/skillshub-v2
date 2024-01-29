<?php

namespace App\Http\Controllers\Website\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    public function create(Exam $exam): View
    {
        $questions = $exam->questions;

        return view('website.pages.exams.create', [
            'exam' => $exam,
            'questions' => $questions,
        ]);
    }

    public function store(Request $request, Exam $exam): RedirectResponse
    {
        return to_route('');
    }
}

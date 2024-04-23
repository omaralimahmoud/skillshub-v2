<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ExamStoreQuestionRequest;
use App\Http\Requests\dashboard\ExamUpdateQuestionRequest;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ExamQuestionController extends Controller
{
    public function show(Exam $exam): View
    {

        return view('dashboard.pages.exams.questions.show', [
            'exam' => $exam,
        ]);
    }

    public function create(Exam $exam): View
    {

        if (session('previous') !== "exam/$exam->id" and session('current') !== "exam/$exam->id") {
            return redirect(route('dashboard.exams.index'));
        }

        $exam_id = $exam->id;
        $question_number = $exam->question_number;

        //dd($exam_id);

        return view('dashboard.pages.exams.questions.create', [
            'exam_id' => $exam_id,
            'question_number' => $question_number,
        ]);

    }

    public function store(Exam $exam, ExamStoreQuestionRequest $request): RedirectResponse
    {
        $request->session()->flash('current', "exam/$exam->id");

        for ($i = 0; $i < $exam->question_number; $i++) {
            Question::create([
                'exam_id' => $exam->id,
                'title' => $request->titles[$i],
                'right_answer' => $request->right_answers[$i],
                'option_1' => $request->option_1s[$i],
                'option_2' => $request->option_2s[$i],
                'option_3' => $request->option_3s[$i],
                'option_4' => $request->option_4s[$i],
            ]);

        }

        $exam->update([
            'is_active' => 1,
        ]);

        return redirect(route('dashboard.exams.index'));

    }

    public function edit(Exam $exam, Question $question): View
    {

        return view('dashboard.pages.exams.questions.edit', [
            'exam' => $exam,
            'question' => $question,

        ]);
    }

    public function update(Exam $exam, Question $question, ExamUpdateQuestionRequest $request): RedirectResponse
    {

        $question->update([
            'title' => $request->title,
            'right_answer' => $request->right_answer,
            'option_1' => $request->option_1,
            'option_2' => $request->option_2,
            'option_3' => $request->option_3,
            'option_4' => $request->option_4,
        ]);
        $request->session()->flash('message', 'row update successfully');

        return redirect(route('dashboard.exams.questions.show', $exam->id));

    }
}

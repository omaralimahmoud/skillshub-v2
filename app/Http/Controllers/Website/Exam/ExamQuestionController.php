<?php

namespace App\Http\Controllers\Website\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamQuestionController extends Controller
{
    public function store(Exam $exam, Request $request): RedirectResponse
    {
        /* if (session('previous') !== "store/$exam->id") {
             return redirect(route('website.exams.show', $exam));
         }*/

        $user = Auth::user();
        if ($user->exams->contains($exam->id)) {
            $user->exams()->updateExistingPivot($exam->id, [
                'status' => 'closed',
                'started_at' => now(),
            ]);
        } else {
            $user->exams()->attach($exam->id, ['started_at' => now()]);
        }

        $request->session()->flash('previous', "start/$exam->id");

        return redirect(route('website.exams.questions.create', $exam));
    }

    public function create(Exam $exam, Request $request): View|RedirectResponse
    {

        if (session('previous') !== "start/$exam->id") {
            return redirect(route('website.exams.show', $exam));
        }

        $questions = $exam->questions;
        $request->session()->flash('previous', "exams/$exam->id");

        return view('website.pages.exams.questions.create', [
            'exam' => $exam,
            'questions' => $questions,
        ]);
    }

    public function submit(Exam $exam, Request $request): RedirectResponse
    {

        if (session('previous') !== "exams/$exam->id") {
            return redirect(route('website.exams.show', $exam));
        }

        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|in:1,2,3,4 ',
        ]);
        //calculation score

        $points = 0;
        $totalQuestionNumber = $exam->questions->count();
        foreach ($exam->questions as $question) {
            if (isset($request->answers[$question->id])) {
                $userAnswers = $request->answers[$question->id];
                $rightAnswers = $question->right_answer;

                if ($userAnswers == $rightAnswers) {
                    $points += 1;
                }
            }
        }

        $score = ($points / $totalQuestionNumber) * 100;
        // calculating time mins
        $user = Auth::user();
        $pivotRow = $user->exams()->firstWhere('exam_id', $exam->id);
        $startTime = $pivotRow->pivot->started_at;
        $submitTime = now();

        $time_minutes = $submitTime->diffInMinutes($startTime);
        if ($time_minutes > $pivotRow->duration_minutes) {
            $score = 0;
        }

        //update  pivot row
        $user->exams()->updateExistingPivot($exam->id, [
            'score' => $score,
            'time_minutes' => $time_minutes,
            'finished_at' => $submitTime,
        ]);

        $request->session()->flash('success', "you finished exam successfully with score $score%");

        return redirect(route('website.exams.show', $exam));

    }
}

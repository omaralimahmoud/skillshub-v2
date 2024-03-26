<?php

namespace App\Http\Controllers\Website\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function show(Exam $exam, Request $request): View
    {

        $user = Auth::user();

        $canStartButton = true;

        if ($user !== null) {

            $pivotRow = $user->exams()->firstWhere('exam_id', $exam->id);
            if ($pivotRow !== null and $pivotRow->pivot->status == 'closed') {
                $canStartButton = false;

            }

        }
        // $request->session()->flash('previous', "store/$exam->id");

        return view('website.pages.exams.show', [
            'exam' => $exam,
            'canStartButton' => $canStartButton,
        ]);
    }
}

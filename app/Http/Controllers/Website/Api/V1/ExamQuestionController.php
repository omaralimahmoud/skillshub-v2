<?php

namespace App\Http\Controllers\Website\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ExamResource;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamQuestionController extends Controller
{
    public function show(Exam $exam)
    {
        $exam = $exam->load('questions');

        return ExamResource::make($exam);
    }

    public function store(Exam $exam, Request $request)
    {
        $user = $request->user();

        if ($user->exams->contains($exam->id)) {
            $user->exams()->updateExistingPivot($exam->id, [
                'status' => 'closed',
                'started_at' => now(),
            ]);
        } else {
            $user->exams()->attach($exam->id, ['started_at' => now()]);
        }

        return response()->json([
            'message' => 'you start exam',
        ]);
    }

    public function submit(Exam $exam, Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'answers' => 'required|array',
            'answers.*' => 'required|in:1,2,3,4 ',
        ]);
        if ($Validator->fails()) {
            return response()->json($Validator->errors());
        }
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

        //calculating time mins
        $user = $request->user();
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

        return response()->json([
            'message' => "you submitted exams successfully, your score is $score ",
        ]);

    }
}

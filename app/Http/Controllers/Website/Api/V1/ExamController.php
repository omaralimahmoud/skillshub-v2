<?php

namespace App\Http\Controllers\Website\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ExamResource;
use App\Models\Exam;

class ExamController extends Controller
{
    public function show(Exam $exam)
    {
        return ExamResource::make($exam);
    }
}

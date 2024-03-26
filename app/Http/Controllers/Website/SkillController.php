<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Contracts\View\View;

class SkillController extends Controller
{
    public function show(Skill $skill): View
    {
        $exams = $skill->exams()->active()->withCount('users')->get();

        //dd($exams);
        return view('website.pages.skills.show', [
            'skill' => $skill,
            'exams' => $exams,
        ]);
    }
}

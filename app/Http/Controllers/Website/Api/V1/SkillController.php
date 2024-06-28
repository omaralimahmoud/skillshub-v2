<?php

namespace App\Http\Controllers\Website\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\SkillResource;
use App\Models\Skill;

class SkillController extends Controller
{
    public function show(Skill $skill)
    {
        $skill = $skill->load('exams');

        return SkillResource::make($skill);
    }
}

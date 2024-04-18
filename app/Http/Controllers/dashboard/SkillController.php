<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\SkillStoreRequest;
use App\Http\Requests\dashboard\SkillUpdateRequest;
use App\Models\Category;
use App\Models\Skill;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index(): View
    {
        $skills = Skill::with('category')->latest()->paginate(10);

        $categories = Category::select('id', 'name')->latest()->get();

        return view('dashboard.pages.skills.index', [
            'skills' => $skills,
            'categories' => $categories,
        ]);
    }

    public function store(SkillStoreRequest $request): RedirectResponse
    {
        $request->addSkills();
        $request->session()->flash('message', 'row added successfully');

        return back();
    }

    public function update(SkillUpdateRequest $request): RedirectResponse
    {

        $request->updateSkill();
        $request->session()->flash('message', 'row updated successfully');

        return back();
    }

    public function toggle(Skill $skill): RedirectResponse
    {
        $skill->update([
            'is_active' => ! $skill->is_active,
        ]);

        return back();
    }

    public function destroy(Skill $skill, Request $request): RedirectResponse
    {
        try {
            $pathImage = $skill->image;
            $skill->delete();
            Storage::delete('skills', $pathImage);
            $message = 'row deleted successfully';
        } catch (Exception $e) {
            $message = "can't deleted this row";
        }

        $request->session()->flash('message', $message);

        return back();
    }
}

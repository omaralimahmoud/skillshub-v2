<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ExamStoreRequest;
use App\Http\Requests\dashboard\ExamUpdateRequest;
use App\Models\Exam;
use App\Models\Skill;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    public function index(): View
    {
        $exams = Exam::with('skill')->select('id', 'name', 'image', 'skill_id', 'question_number', 'is_active')
            ->latest()->paginate(10);

        // dd($exams);
        return view('dashboard.pages.exams.index', [
            'exams' => $exams,
        ]);
    }

    public function show(Exam $exam): View
    {

        return view('dashboard.pages.exams.show', [
            'exam' => $exam,
        ]);
    }

    public function create(): View
    {
        $skills = Skill::latest()->select('id', 'name')->get();

        return view('dashboard.pages.exams.create', [
            'skills' => $skills,
        ]);
    }

    public function store(ExamStoreRequest $request): RedirectResponse
    {

        $pathImage = Storage::put('exams', $request->file('image'));
        $exam = Exam::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'image' => $pathImage,
            'skill_id' => $request->skill_id,
            'question_number' => $request->question_number,
            'difficulty' => $request->difficulty,
            'duration_minutes' => $request->duration_minutes,
            'is_active' => 0,
        ]);

        $request->session()->flash('previous', "exam/$exam->id");

        return redirect(route('dashboard.exams.questions.create', $exam->id));
    }

    public function edit(Exam $exam): View
    {
        $skills = Skill::select('id', 'name')->get();

        return view('dashboard.pages.exams.edit', [
            'skills' => $skills,
            'exam' => $exam,
        ]);

    }

    public function update(Exam $exam, ExamUpdateRequest $request): RedirectResponse
    {

        $pathImage = $exam->image;

        if ($request->hasFile('image')) {
            Storage::delete($pathImage);
            $pathImage = Storage::put('exams', $request->file('image'));

        }
        $exam->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ],
            'description' => [
                'en' => $request->description_en,
                'ar' => $request->description_ar,
            ],
            'image' => $pathImage,
            'skill_id' => $request->skill_id,
            'difficulty' => $request->difficulty,
            'duration_minutes' => $request->duration_minutes,

        ]);
        $request->session()->flash('message', 'row updated successfully');

        return redirect(route('dashboard.exams.show', $exam->id));
    }

    public function toggle(Exam $exam): RedirectResponse
    {
        if ($exam->question_number == $exam->questions()->count()) {
            $exam->update([
                'is_active' => ! $exam->is_active,
            ]);
        }

        return back();

    }

    public function destroy(Exam $exam, Request $request): RedirectResponse
    {

        try {
            $pathImage = $exam->image;
            $exam->delete();
            $exam->questions()->delete();
            Storage::delete($pathImage);
            $message = 'row deleted successfully';

        } catch (Exception $e) {
            $message = "can't delete this row";
        }

        $request->session()->flash('message', $message);

        return back();

    }
}

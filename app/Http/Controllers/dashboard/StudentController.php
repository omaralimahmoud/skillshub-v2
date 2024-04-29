<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    public function index(): View
    {
        $studentRole = Role::firstWhere('name', 'student');
        $students = User::role('student')->latest()->paginate(10);

        //dd($students);

        return view('dashboard.pages.students.index', [
            'studentRole' => $studentRole,
            'students' => $students,

        ]);
    }

    public function show($id): View
    {
        $student = User::findOrFail($id);

        if (! $student->hasRole('student')) {
            return back();
        }
        $exams = $student->exams;

        //dd($exams);
        return view('dashboard.pages.students.show', [
            'student' => $student,
            'exams' => $exams,

        ]);
    }

    public function openExam($studentId, $examId): RedirectResponse
    {
        $student = User::findOrFail($studentId);
        $student->exams()->updateExistingPivot($examId, [
            'status' => 'opened',
        ]);

        return back();
    }

    public function closeExam($studentId, $examId): RedirectResponse
    {
        $student = User::findOrFail($studentId);
        $student->exams()->updateExistingPivot($examId, [
            'status' => 'closed',
        ]);

        return back();
    }
}

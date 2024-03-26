<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CanEnterExam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $exam = $request->route()->parameter('exam');
        //dd($examId->id);
        $user = Auth::user();
        $pivotRow = $user->exams()->firstWhere('exam_id', $exam->id);
        if ($pivotRow !== null and $pivotRow->pivot->status == 'closed') {
            return redirect(route('website.index'));
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class IsStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $studentRole = Role::firstWhere('name', 'student');
        if (Auth::user()->role_id !== $studentRole->id) {
            return redirect(route('website.index'));
        }

        return $next($request);
    }
}

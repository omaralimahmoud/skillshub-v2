<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $SuperAdminRole = Role::firstWhere('name', 'superAdmin');
        if (Auth::user()->role_id !== $SuperAdminRole->id) {
            return redirect(route('website.index'));
        }

        return $next($request);
    }
}

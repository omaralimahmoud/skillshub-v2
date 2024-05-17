<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\AdminRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(): View
    {
        $admins = User::role(['admin', 'superAdmin'])->latest()->paginate(10);

        return view('dashboard.pages.admins.index', [
            'admins' => $admins,

        ]);
    }

    public function create(): View
    {
        $roles = Role::select('id', 'name')->WhereIn('name', ['superAdmin', 'admin'])->get();

        return view('dashboard.pages.admins.create', [
            'roles' => $roles,
        ]);
    }

    public function store(AdminRequest $request): RedirectResponse
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $create_role = $request->role;
        $user->assignRole($create_role);

        VerifyEmail::createUrlUsing(function ($notifiable) {
            return URL::temporarySignedRoute(
                'dashboard.dashboard.auth.verification.verify',
                now()->addMinutes(config('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });

        event(new Registered($user));

        return redirect(route('dashboard.admins.index'));

    }

    public function promote($id): RedirectResponse
    {

        $admin = User::findOrFail($id);
        $admin->syncRoles([
            'role_id' => Role::select('id')->firstWhere('name', 'superAdmin')->id,
        ]);

        return back();
    }

    public function demote($id): RedirectResponse
    {
        $superAdmin = User::findOrFail($id);
        $superAdmin->syncRoles([
            'role_id' => Role::select('id')->firstWhere('name', 'admin')->id,
        ]);

        return back();

    }
}

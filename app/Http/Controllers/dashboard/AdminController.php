<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(): View
    {
        $admins = User::role(['admin', 'superAdmin'])->latest()->paginate(10);

        // $Adminroles= Role::select('id','name')->get();
        $a = Role::all()->pluck('name');

        //dd($x);

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

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:5|max:25|confirmed',
            'role' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $create_role = $request->role;
        $user->assignRole($create_role);
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

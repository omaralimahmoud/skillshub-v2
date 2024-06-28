<?php

namespace App\Http\Controllers\Website\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterUserController extends Controller
{
    public function register(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:5|max:25|confirmed', ]);
        if ($Validator->fails()) {
            return response()->json($Validator->errors());
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole(['student']);
        $token = $user->createToken('auth-token');

        return ['token' => $token->plainTextToken];

    }
}

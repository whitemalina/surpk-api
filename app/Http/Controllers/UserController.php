<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return User::create([
            'password' => Hash::make($request->password)
        ] +$request->only(['name', 'login']));
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('login', $request->login)->first();

        if($user && Hash::check($request->password, $user->password)) {
            $user->generateToken();

            return [
                'token' => $user->api_token,
                'username' => $user->name
            ];
        }

        return response()->json([
            'message' => "The given data was invalid.",
            'errors' => [
                'login' => ['Не верный логин или пароль']
            ]
        ], 422);
    }
}

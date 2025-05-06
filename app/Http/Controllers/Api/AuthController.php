<?php

namespace App\Http\Controllers\Api;

use App\Actions\Auth\RegisterUserAction;
use App\Data\Auth\LoginData;
use App\Actions\Auth\LoginAction;
use App\Data\Auth\RegisterUserData;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterUserData $data)
    {
        $user = RegisterUserAction::run($data);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => UserResource::make($user),
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function store(LoginData $data)
    {
        $token = LoginAction::run($data);

        $cookie = cookie(config('site.cookie_name'), $token, time() + 60 * 24 * 7); // 7 days

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ])->withCookie($cookie);
    }

    public function me()
    {
        return UserResource::make(Auth::user());
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'logout success'
        ]);
    }
}

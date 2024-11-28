<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\AuthUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(private AuthUserService $authService)
    {
    }

    function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete;
        return response()->json(['message' => "logged Out"],200);
    }

    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Auth-Token')->plainTextToken;
            $user['token'] = $token;
            $data = AuthUserResource::make($user);
            return successResponse($data,"Welcome ");
        }
        return response()->json(['message' => "Username or password is incorrect"],200);
    }
}

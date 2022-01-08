<?php

namespace App\Http\Controllers;

use App\Actions\Users\RegisterUserAction;
use App\DTO\JwtToken;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Resources\JwtTokenResource;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'registration']]);
    }

    /**
     * @return JwtTokenResource|JsonResponse
     */
    public function login(LoginRequest $request): JwtTokenResource
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error', 'Unauthorized'], 401);
        }

        return new JwtTokenResource(new JwtToken($token));
    }

    public function registration(RegistrationRequest $request, RegisterUserAction $action): JsonResponse
    {
        $action->execute($request);

        return response()->json(['message' => 'Successfully registration!']);
    }

    public function profile(): ProfileResource
    {
        return new ProfileResource(auth()->user());
    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh(): JwtTokenResource
    {
        return new JwtTokenResource(new JwtToken(auth()->refresh()));
    }
}
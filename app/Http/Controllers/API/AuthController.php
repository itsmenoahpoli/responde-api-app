<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Services\AuthService;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request) : JsonResponse
    {
        return $this->authService->userLogin(
            $request->only('email', 'password'),
            $request->rememberMe ?? false,
            $request->ip()
        );
    }

    public function logout(Request $request)
    {

    }

    public function requestOtp(Request $request)
    {

    }

    public function verifyOtp(Request $request)
    {

    }
}

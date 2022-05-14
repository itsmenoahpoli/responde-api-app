<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Services\AuthService;

class AuthController extends Controller
{
    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request) : JsonResponse
    {
        return $this->authService->userLogin(
            $request->only('email', 'password'),
            $request->rememberMe ?? false
        );
    }
}

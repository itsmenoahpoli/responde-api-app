<?php

namespace App\Services;

use Auth;

class AuthService
{
    public function userLogin($user, $rememberMe = false)
    {
        try
        {
            if (Auth::attempt($user))
            {
                $authToken = Auth::user()->createToken(
                    time().'-'.Auth::user()->email,
                    $rememberMe
                )->plainTextToken;

                return response()->json([
                    'user' => Auth::user(),
                    'authToken' => $authToken
                ]);
            }

            return response()->json(
                'Unauthorized',
                401
            );
        } catch (Exception $e)
        {
            response()->json(
                $e->getMessage(),
                500
            );
        }
    }
}

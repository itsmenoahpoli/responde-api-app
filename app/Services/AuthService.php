<?php

namespace App\Services;

use Auth;

class AuthService
{
    public function userLogin($user, $rememberMe = false)
    {

        try
        {
            if (Auth::attempt($user, $rememberMe))
            {
                $authToken = Auth::user()->createToken(
                    time().'-'.Auth::user()->email
                )->plainTextToken;

                // Show user-role
                Auth::user()->user_role;

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

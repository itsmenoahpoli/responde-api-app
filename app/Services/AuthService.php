<?php

namespace App\Services;

use App\Traits\SessionLogTrait;

use Auth;

class AuthService
{
    use SessionLogTrait;

    public function userLogin($user, $rememberMe = false, $userIpAddress = '')
    {

        try
        {
            if (Auth::attempt($user, $rememberMe))
            {
                $authToken = Auth::user()->createToken(
                    time().'-'.Auth::user()->email
                )->plainTextToken;

                $sessionStart = $this->startSession(
                    Auth::user(),
                    $userIpAddress,
                    $authToken
                );

                // Show user-role
                Auth::user()->user_role;

                // Check if 2-factor-authentication is enabled


                return response()->json([
                    'user' => Auth::user(),
                    'session' => $sessionStart,
                    'authToken' => $authToken
                ], 200);
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

    public function userLogout($session)
    {
        try
        {
            $sessionEnd = $this->endSession($session);

            return response()->json(
                $sessionEnd,
                200
            );
        } catch (Exception $e)
        {
            return response()->json(
                $e->getMessage(),
                500
            );
        }
    }

    public function userVerify($user)
    {
        try
        {

        } catch (Exception $e)
        {
            return response()->json(
                $e->getMessage(),
                500
            );
        }
    }

    public function userResetPassword($user)
    {
        try
        {

        } catch (Exception $e)
        {
            return response()->json(
                $e->getMessage(),
                500
            );
        }
    }
}

<?php

namespace App\Traits;

use App\Models\Users\UserSessionLog;

use Carbon\Carbon;
use Str;

trait SessionLogTrait
{
    public function checkIfUserHasActiveSession($user)
    {

    }

    public function startSession($user, $ip)
    {
        try
        {
            return UserSessionLog::create([
                's_uid' => Str::uuid(),
                'user_id' => $user->id,
                'session_start' => Carbon::now(),
                'session_ip' => $ip
            ]);
        } catch (Exception $e)
        {
            throw $e->getMessage();
        }
    }

    public function endSession($user, $session)
    {
        try
        {
            // TODO: Retrieve user session via session unique id then end session
            return UserSessionLog::findOrFail();
        } catch (Exception $e)
        {
            throw $e->getMessage();
        }
    }
}

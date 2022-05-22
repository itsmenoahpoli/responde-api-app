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

    public function startSession($user, $ip, $authToken)
    {
        try
        {
            return UserSessionLog::create([
                's_uid' => Str::uuid(),
                'user_id' => $user->id,
                'api_token' => $authToken,
                'session_start' => Carbon::now(),
                'session_ip' => $ip
            ]);
        } catch (Exception $e)
        {
            throw $e->getMessage();
        }
    }

    public function endSession($request)
    {
        try
        {
            $session = UserSessionLog::where('api_token', $request->bearerToken())->first();

            $session_duration = $this->calcSessionDuration($session->session_start);

            $endedSession = UserSessionLog::whereId($session->id)->update([
                'session_end' => Carbon::now(),
                'session_duration' => $session_duration.'m'
            ]);

            return UserSessionLog::whereId($session->id)->first();
        } catch (Exception $e)
        {
            throw $e->getMessage();
        }
    }

    private function calcSessionDuration($sessionStart)
    {
        return Carbon::createFromFormat(
                'Y-m-d H:i:s',
                $sessionStart
            )->diffInMinutes(
                Carbon::now()
            );
    }
}

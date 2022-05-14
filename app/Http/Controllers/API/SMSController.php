<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Services\SmsService;

class SMSController extends Controller
{
    public $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function send() : JsonResponse
    {
        return response()->json(
            $this->smsService->sendSms(),
            200
        );
    }
}

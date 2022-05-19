<?php

namespace App\Services;

class SmsService
{
    private $vonageCredentials;
    private $vonageClient;
    private $vonageSms;

    public $brandName = 'GO RESPONDE APP';

    public function __construct()
    {
        $this->vonageCredentials = new \Vonage\Client\Credentials\Basic(
            env('VONAGE_API_KEY'),
            env('VONAGE_ACCOUNT_SECRET_KEY')
        );

        $this->vonageClient = new \Vonage\Client(
            $this->vonageCredentials
        );
    }

    public function vonageSendSms($sms)
    {
        try
        {
            $response = $this->vonageClient->sms()->send(
                new \Vonage\SMS\Message\SMS(
                    $sms['to'],
                    $this->brandName,
                    $sms['message']
                )
            );

            $sendStatus = $response->current();

            if ($sendStatus->getStatus() === 0)
            {
                return response()->json(
                    'SMS successfully sent',
                    200
                );
            }

            return response()->json(
                'SMS failed to be sent',
                424
            );
        } catch (Exception $e)
        {
            throw $e->getMessage();
        }
    }

    public function sendSms()
    {
        try
        {
            return $this->vonageSendSms([
                'to' => '639088496955',
                'message' => 'GO RESPONDE APP: SOS! My current location is 14.5995° N, 120.9842° E'
            ]);
        } catch (Exception $e)
        {
            return response()->json(
                $e->getMessage(),
                500
            );
        }
    }
}

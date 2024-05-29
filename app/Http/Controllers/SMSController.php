<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SMSController extends Controller
{
    public function index()
    {
        $recevied = ['+923112190270', '+923112190270'];

        $message = 'all message';
        try {
            $twilio_id = env('TWILIO_SID');
            $twilio_token = env('TWILIO_TOKEN');
            $twilio_from = env('TWILIO_FROM');

            $client = new Client($twilio_id, $twilio_token);

            foreach ($recevied as $list) {
                $client->messages->create($list, [
                    'from' => $twilio_from,
                    'body' => $message,
                ]);
            }

            return 'message sent ...';
        } catch (Exception $th) {
            echo $th . 'not working';
        }
    }
}

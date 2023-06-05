<?php

namespace App\Listeners\UserActivation;

use App\Events\UserActivation;
use http\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Ghasedak\Laravel\GhasedakFacade;

class SendSMSNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserActivation  $event
     * @return void
     */
    public function handle(UserActivation $event)
    {



//        $client = new \GuzzleHttp\Client([
//            'verify' => false
//        ]);
//
//        $response = $client->request('POST' , 'https://api.kavenegar.com/v1/437A5430503042364E6E797061673830304F363179302F756149784F4B7A50793142326C6A6976436775733D/sms/send.json' , [
//            'form_params' => [
//                'receptor' => $event->user->phone,
//                'message' => route('activation.account' , $event->activationCode)
//            ]
//        ]);
//        Log::info(route('activation.account' , $event->activationCode));
    }
}

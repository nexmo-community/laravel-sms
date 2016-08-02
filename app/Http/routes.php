<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sms/send/{to}', function(\Nexmo\Client $nexmo, $to){
    $message = $nexmo->message()->send([
        'to' => $to,
        'from' => env('NEXMO_NUMBER'),
        'text' => 'Sending SMS from Laravel. Woohoo!'
    ]);
    Log::info('sent message: ' . $message['message-id']);
});

Route::post('/sms/receive', function(\Nexmo\Client $nexmo){
    $message = \Nexmo\Message\InboundMessage::createFromGlobals();
    Log::info('got text: ' . $message->getBody());
    $reply =$nexmo->message()->send($message->createReply('Laravel Auto-Reply FTW!'));
    Log::info('sent reply: ' . $reply['message-id']);
});

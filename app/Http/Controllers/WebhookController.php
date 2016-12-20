<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Curl;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function type(Request $request, $type = '')
    {
        //$this->log(__METHOD__);

        switch ($type){
            case 'telegram':
                $input = $request->getContent();

                $chatData = json_decode($input);

                if(!empty($chatData->message->chat->id)){
                    switch ($chatData->message->text){
                        default:
                            $message = 'Привет, '.$chatData->message->from->first_name. '!'.PHP_EOL;
                            $message .= 'Узнай, какими командами можно управлять мной: /help.';
                            break;
                        case '/help':
                            $message = 'Вот список команд:' . PHP_EOL;
                            $message .= '/go - получить тренировочную программу на сегодня;' . PHP_EOL;
                            $message .= '/random - получить случайную тренировочную программу.';
                            break;
                        case '/subscribe':
                            $message = 'Я буду присылать тебе ништяки каждую субботу.' . PHP_EOL;
                            $message .= 'Ты можешь отказаться от их получения, прислав мне команду /mute.';
                            break;
                        case '/mute':
                            $message = 'Я исключил тебя из рассылки.' . PHP_EOL;
                            $message .= 'Подписывайся снова в любой момент, прислав мне команду /subscribe.';
                            break;
                        case '/go':
                        case '/random':
                            try{
                                $calendar = Calendar::first();
                                if(empty($calendar)) throw new \Exception;

                                $exercises = $calendar->exercises()->get();
                                if(empty($exercises) || !$exercises->count()) throw new \Exception;

                                $message = 'Программа на сегодня:'.PHP_EOL.PHP_EOL;
                                $messages = [];
                                $i = 1;
                                foreach($exercises as $exercise){
                                    $messages[] = $i.') '.$exercise->name;
                                    $messages[] = strip_tags($exercise->notice);
                                    $messages[] = strip_tags($exercise->text);
                                    $i++;
                                }
                                $message .= implode(PHP_EOL, $messages);
                            }catch (\Exception $e){
                                $message = 'Программа на сегодня отутствует';
                            }

                        break;
                    }

                    $data = array(
                        'chat_id'=>$chatData->message->chat->id,
                        'text'=>$message
                    );

                    Curl::to('https://api.telegram.org/bot320308961:AAHMoWetOk3iP1USBOeAeeF-m2eTWRF_KD4/sendMessage')
                        ->withData( $data )
                        ->post();
                }
            break;
        }
    }

    private function log($row = '')
    {
        file_put_contents(app()->storagePath().'/logs/webhook.log', $row.PHP_EOL.PHP_EOL, FILE_APPEND);
    }
}

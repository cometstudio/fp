<?php

/**
 * @param string $row
 */
function logme($row = '')
{
    //file_put_contents('./log', $row.PHP_EOL.PHP_EOL, FILE_APPEND);
}

/**
go - Get a training program for today
subscribe - Subscribe to weekly newsletter
mute - Discard subscription
 */

logme('Something happened');

$input = file_get_contents('php://input');

logme('Input:');
logme(print_r($input, true));

$query = $_REQUEST;

//logme('Request:');
//logme(print_r($query, true));

$chatData = json_decode($input);

logme('Data:');
logme(print_r($chatData, true));

if(!empty($chatData->message->chat->id)){
    $message = '';
    switch ($chatData->message->text){
        default:
            $message = 'Привет, '.$chatData->message->from->first_name. '!'.PHP_EOL;
            $message .= 'Посмотри, какими командами можно управлять мной: /help.';
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
            $message = 'Сегодня качаем ноги.' . PHP_EOL;
            $message .= '1) Приседания Плие:' . PHP_EOL;
            $message .= ' - 12 повторов с лёгким весом' . PHP_EOL;
            $message .= ' - 10 повторов с средне-лёгким весом' . PHP_EOL;
            $message .= ' - 8 повторов с средним весом' . PHP_EOL;
            $message .= ' - 3 повтора с тяжелым весом' . PHP_EOL;
        break;
    }

    $data = array(
        'chat_id'=>$chatData->message->chat->id,
        'text'=>$message
    );

    HTTPRequest('https://api.telegram.org/bot320308961:AAHMoWetOk3iP1USBOeAeeF-m2eTWRF_KD4/sendMessage',
        $data, 'POST'
    );
}

/**
 * @param string $location
 * @param array $data
 * @param string $method
 * @param array $headers
 * @return array
 */
function HTTPRequest($location = '', $data = array(), $method = 'POST', $headers = array())
{
    logme(__FILE__.'::'.__METHOD__);

    $ch = curl_init();

    switch($method){
        default:
            $headers = array_merge($headers, array(
                'Content-type: application/x-www-form-urlencoded',
            ));

            $query = http_build_query($data);

            $location = $location.'?'.$query;
        break;
        case 'POST':
            logme('POST');
            $headers = array_merge($headers, array());

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            logme('Payload:');
            logme(print_r($data, true));
        break;
    }

    curl_setopt($ch, CURLOPT_URL, $location);
    curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $content = curl_exec($ch);
    $info = curl_getinfo($ch);

    logme('Request:');
    logme(print_r($info, true));
    logme('Response:');
    logme($content);

    curl_close($ch);

    if(empty($info) || ($info['http_code'] != 200)){
        logme('Error at HTTP request');
    }

    return array(
        'content'=>$content,
        'info'=>$info
    );
}

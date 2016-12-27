<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Meal;
use Curl;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function type($type = '')
    {
        //$this->log(__METHOD__);

        switch ($type){
            case 'telegram':
                $this->runTelegramBot();
            break;
        }
    }
    
    protected function runTelegramBot()
    {
        try {
            $message = '';
            $messages = [];

            $input = $this->request->getContent();

            $envelope = json_decode($input);

            if (empty($envelope->message->chat->id)) throw new \Exception;

                $this->sendTelegramChatAction($envelope->message->chat->id);

                preg_match("/^\/([a-z]+)(\d+)?$/", $envelope->message->text, $matches);

                switch ($matches[1]) {
                    default:
                        $messages[] = 'Привет, ' . $envelope->message->from->first_name . '!';
                        $messages[] = $this->getTelegramMenuLink();
                    break;
                    case 'menu':
                        $messages[] = 'Вот список команд:';
                        $messages[] = '';
                        $messages[] = '/go - тренировочная программа на сегодня;' ;
                        $messages[] = '/random - случайная тренировочная программа;' ;
                        $messages[] = '/meal - рацион питания на сегодня.';
                        $messages[] = '';
                        $messages[] = 'Вся программа - на сайте '.env('APP_URL');
                        break;
                    case 'go':
                        $this->getTelegramExercises($messages, time());
                    break;
                    case 'random':
                        $this->getTelegramExercises($messages);
                    break;
                    case 'meal':
                        try {
                            $calendar = Calendar::firstOrFail();

                            $recipes = $calendar->recipes()->get();
                            if (empty($recipes) || !$recipes->count()) throw new \Exception;

                            if(!empty($matches[2]) && is_numeric($matches[2])){
                                $meal = Meal::where('id', '=', $matches[2])->firstOrFail();

                                $messages[] = '*'.$meal->name.'*';

                                $i = 1;
                                foreach($recipes->filter(function($recipe) use ($meal){ return $recipe->meal_id == $meal->id; }) as $recipe){
                                    $messages[] = '';
                                    $messages[] = '*'.$i . ') ' . $recipe->name.'*';
                                    if($text = trim(strip_tags(html_entity_decode($recipe->notice)))) $messages[] = $text;
                                    if($text = trim(strip_tags(html_entity_decode($recipe->text)))) $messages[] = PHP_EOL . $text;
                                    $i++;
                                }

                                $messages[] = '';
                                $messages[] = '/meal - весь рацион на сегодня';
                            }else{
                                $mealIds = $recipes->pluck('meal_id');

                                $meals = Meal::whereIn('id', $mealIds)->orderBy('ord', 'DESC')->get();

                                foreach($meals as $meal){
                                    $messages[] = '/meal'.$meal->id.' - '.mb_strtolower($meal->name, 'utf-8');
                                }
                            }
                        } catch (\Exception $e) {
                            echo $e->getLine();
                            $messages[] = 'Рацион не составлен';
                        }

                        $messages[] = $this->getTelegramMenuLink();
                    break;
                }

            $message = implode(PHP_EOL, $messages);

            $data = array(
                'chat_id' => $envelope->message->chat->id,
                'text' => $message,
                'parse_mode' => 'Markdown'
            );

            $this->touchTelegramAPI('sendMessage', $data);
        }catch (\Exception $e){
            echo $e->getLine();
        }
    }

    private function getTelegramExercises(&$messages, $startAt = 0)
    {
        try {
            $builder = new Calendar();

            if(!empty($startAt)){
                $builder
                    ->where('start_at', '>=', mktime(0,0,0, date('m', $startAt), date('j', $startAt), date('Y', $startAt)))
                    ->where('start_at', '<=', mktime(23,59,59, date('m', $startAt), date('j', $startAt), date('Y', $startAt)));
            }

            $calendar = $builder->first();

            if (empty($calendar)) throw new \Exception;

            $exercises = $calendar->exercises()->get();
            if (empty($exercises) || !$exercises->count()) throw new \Exception;

            $messages[] = '*Программа на сегодня:*';
            $messages = [];
            $i = 1;
            foreach ($exercises as $exercise) {
                $messages[] = PHP_EOL;
                $messages[] = '*'.$i . ') ' . $exercise->name.'*';
                if($text = trim(strip_tags(html_entity_decode($exercise->notice)))) $messages[] = $text;
                if($text = trim(strip_tags(html_entity_decode($exercise->text)))) $messages[] = PHP_EOL . $text;
                $i++;
            }
            $messages[] = $this->getTelegramMenuLink();
        } catch (\Exception $e) {
            $messages[] = 'Программа на сегодня отутствует';
        }
    }

    private function getTelegramMenuLink()
    {
        return PHP_EOL.'Меню команд: /menu';
    }

    private function sendTelegramChatAction($chatId = 0, $action = 'typing')
    {
        $this->log($chatId);

        $this->touchTelegramAPI('sendChatAction', [
           'chat_id'=>$chatId,
           'action'=>$action,
        ]);
    }

    private function touchTelegramAPI($method = '', $data = [])
    {
        try{
            if(empty($method)) throw new \Exception;

            $data = array_merge([], $data);

            Curl::to('https://api.telegram.org/bot' . env('TELEGRAM_TOKEN') . '/'.$method)
                ->withData($data)
                ->post();

            return true;
        }catch (\Exception $e){
            return false;
        }
    }

    private function log($row = '')
    {
        file_put_contents(app()->storagePath().'/logs/webhook.log', $row.PHP_EOL.PHP_EOL, FILE_APPEND);
    }
}

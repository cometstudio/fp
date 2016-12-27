<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Jobs\SubmitVerificationEmail;

class TestController extends Controller
{
    public function index()
    {
        $replyMarkup = array(
            'inline_keyboard' => [[['text' =>  'A', 'callback_data' => '/meal/1']], [['text' =>  'B', 'callback_data' => '/meal/2']]]
        );

//        $replyMarkup = array(
//        'inline_keyboard' => array(
//            array('text'=>'A')
//        );

        $encodedMarkup = json_encode($replyMarkup);

        echo $encodedMarkup;
        die;
        //$this->dispatch(new SubmitVerificationEmail(Auth::user()));
    }
}

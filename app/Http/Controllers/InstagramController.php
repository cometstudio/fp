<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Curl;

class InstagramController extends Controller
{
    public function auth(Request $request)
    {
        if(!$request->has('code')){
//            $authURL = Curl::to('https://api.instagram.com/oauth/access_token')->withData([
//                'client_id'=>'6c5d95c2eb7447d19c0cc1000a7965de',
//                'redirect_uri'=>'http://fitnespraktika.ru/instagram/auth',
//                'response_type'=>'code',
//            ])->get();
            $r = Curl::to('https://api.instagram.com/oauth/access_token/?client_id=6c5d95c2eb7447d19c0cc1000a7965de&redirect_uri=http://fitnespraktika.ru/instagram/auth&response_type=code')->get();
            var_dump($r);die;
            die;
        }else{
            $authURL = Curl::to('https://api.instagram.com/oauth/access_token')->withData([
                'client_id'=>'6c5d95c2eb7447d19c0cc1000a7965de',
                'client_secret'=>'',
                'grant_type'=>'authorization_code',
                'redirect_uri'=>'http://fitnespraktika.ru/instagram/auth',
                'code'=>$request->get('code'),
            ])->get();
        }
        print_r($authURL);
        die;
    }
}
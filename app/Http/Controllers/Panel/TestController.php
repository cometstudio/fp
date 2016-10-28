<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests;

use Decryptor;

class TestController extends Controller
{
    public function index()
    {
        $data = [];

        Decryptor::decode(
            '/moskva/avtomobili/lada_granta_2012_844772722',
            844772722,
            '440ee0l626l6b2aa5d390bada567de4e2bf270e804fdc8ac74a479a83dfa086074fbee44d7f5a7ab19305ae2bl40ef04962'
        );

        return view('panel.test.index', $data);
    }
}

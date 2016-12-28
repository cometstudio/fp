<?php

namespace App\Http\Controllers;

class MyController extends Controller
{
    protected $css = 'my';

    public function index()
    {
        $title = 'Персональные данные';

        return view(
            'my.index', [
                'css'=>$this->css,
                'title'=>$title,
            ]
        );
    }
}

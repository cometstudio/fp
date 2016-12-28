<?php

namespace App\Http\Controllers;

class MyController extends Controller
{
    protected $css = 'my';

    public function index()
    {
        return view(
            'my.index', [
                'css'=>$this->css,
            ]
        );
    }
}

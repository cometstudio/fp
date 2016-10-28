<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DynamicController extends Controller
{
    private $css= 'dynamic';

    public function aboutUs()
    {
        return view('dynamic.aboutUs', [
            'css'=>$this->css
        ]);
    }

    public function object()
    {
        return view('dynamic.object', [
            'css'=>$this->css
        ]);
    }
}

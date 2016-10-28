<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    protected $css = 'index';

    public function index()
    {
        return view(
            'index.index', [
                'css'=>$this->css,
            ]
        );
    }
}

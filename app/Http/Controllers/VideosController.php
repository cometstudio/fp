<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class VideosController extends Controller
{
    protected $css = 'videos';

    public function index()
    {
        return view(
            'videos.index', [
                'css'=>$this->css,
            ]
        );
    }
    public function item()
    {
        return view(
            'videos.item', [
                'css'=>$this->css,
            ]
        );
    }
}

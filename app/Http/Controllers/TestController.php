<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Jobs\SubmitVerificationEmail;

class TestController extends Controller
{
    public function index()
    {
        //$this->dispatch(new SubmitVerificationEmail(Auth::user()));
    }
}

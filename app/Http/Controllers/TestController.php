<?php

namespace App\Http\Controllers;

use App\Models\Subscription;

class TestController extends Controller
{
    public function index()
    {
        $subscription = Subscription::where('queued', '=', 1)
            ->orderBy('updated_at', 'DESC')
            ->first();

        if(!empty($subscription)) {

            $subscription->text = preg_replace("/\/images/i", env('APP_URL') . "/images", $subscription->text);

            dd($subscription);
        }

        die;
        //$this->dispatch(new SubmitVerificationEmail(Auth::user()));
    }
}

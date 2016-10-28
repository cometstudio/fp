<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Proxy1;

class ProxyController extends Controller
{
    public function stat()
    {
        /**
         * @var $proxyStat Proxy
         */
        $proxy = Proxy1::select(\DB::raw('COUNT(*) AS total, SUM(tries) AS tries, SUM(successful_tries_abs) AS successful_tries'))->first();

        $proxy->succesfulTriesPercents();

        return view('panel.proxy.stat', compact(
            'proxy'
        ));
    }


}
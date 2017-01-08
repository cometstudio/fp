<?php

namespace App\Http\Controllers;

use App\Models\Supplement;
use Illuminate\Http\Request;
use App\Models\Misc;


class SupplementsController extends Controller
{
    protected $css = 'supplements';

    public function index(Request $request)
    {
        $misc = Misc::where('alias', '=', $request->segment(2))->first();
        $title = !empty($misc) ? !empty($misc->title) ? $misc->title : $misc->name : '';

        $orderBy = $request->has('ob') ? $request->get('ob') : 'name';

        $supplementsBuilder = Supplement::orderBy($orderBy, $request->has('o') ? 'DESC' : 'ASC');

        if($request->has('q')) $supplementsBuilder->where('name', 'LIKE', '%'. $request->get('q') .'%');

        $supplements = $supplementsBuilder->get();

        return view(
            'supplements.index', [
                'css'=>$this->css,
                'title'=>$title,
                'misc'=>$misc,
                'supplements'=>$supplements,
            ]
        );
    }
}

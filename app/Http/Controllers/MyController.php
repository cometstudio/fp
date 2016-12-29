<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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

    public function save(Request $request)
    {
        $user = Auth::user();

        $picture = $request->file('_picture');

        // If a profile picture has been sent
        if(!empty($picture)){

        // Store other data
        }else{
            // Validate input
            $this->validate($request, $user->getValidationRules(), $user->getValidationMessages());

            $data = $request->all();

            // Password change
            if($request->has('_password')){
                $user->password = bcrypt($request->input('_password'));
            }

            $user->update($data);
        }

        return response()->json([

        ]);
    }
}

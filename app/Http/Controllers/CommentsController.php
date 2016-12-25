<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;

class CommentsController extends Controller
{
    public function thread($hash = '')
    {
        $comments = Comment::where('hash', '=', $hash)
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->select([
                'comments.*',
                \DB::raw('users.name AS user_name'),
                \DB::raw('users.gallery AS user_gallery'),
            ])
            ->orderBy('created_at', 'DESC')
            ->get();

        $view = view('comments.thread', [
            'comments'=>$comments
        ])->render();

        return response()->json([
            'view'=>$view,
        ]);
    }

    public function submit(Request $request, $hash = '')
    {
        if(!empty($hash)){
            Comment::create([
                'hash'=>$hash,
                'user_id'=>(Auth::check() ? Auth::user()->id : null),
                'text'=>$request->input('text')
            ]);
        }

        $comments = Comment::where('hash', '=', $hash)
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->select([
                'comments.*',
                \DB::raw('users.name AS user_name'),
                \DB::raw('users.gallery AS user_gallery'),
            ])
            ->orderBy('created_at', 'DESC')
            ->get();

        $view = view('comments.thread', [
            'comments'=>$comments
        ])->render();

        return response()->json([
            'view'=>$view,
        ]);
    }
}

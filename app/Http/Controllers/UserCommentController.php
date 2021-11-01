<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;

class UserCommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        if(Auth::check())
        {
            $data = [
                'post_id' => $request->post_id,
                'user_id' => $request->user_id,
                'body' => $request->body
            ];
            Comment::create($data);
            return redirect()->back();
        } else {
            return redirect('auth.login');
        }
    }

    public function destroy($id)
    {
        if(Auth::check())
        {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return redirect()->back();
        } else {
            return view('auth.login');   
        }
    }
}
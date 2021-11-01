<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Format;
use App\TeamNumber;
use App\Size;
use App\TeamGender;
use App\Photo;
use App\Player;
use App\Comment;

class UserPostController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $user =             Auth::user();
            $posts =            Post::where('user_id', '=', $user->id)->paginate(5);
            $teamformats =      Format::pluck('name','id')->all();
            $numberofteams =    TeamNumber::pluck('numberofteams','id')->all();
            $teamsizes =        Size::pluck('versus','id')->all();
            $gendergroups =     TeamGender::pluck('name','id')->all();
            return view('post', compact('user','posts','teamformats','numberofteams','teamsizes','gendergroups'));
        } else {
            return view('auth.login');
        }
    }

    public function store(PostCreateRequest $request)
    {
        if(Auth::check())
        {
            $input = $request->all();
            $user = Auth::user();
            $user->posts()->create($input);
            return redirect('post');
        } else {
            return view('auth.login');
        }
    }

    public function destroy($id)
    {
        if(Auth::check())
        {
            $post = Post::findOrFail($id);
            $player = Player::wherePostId($id)->delete();
            $comment = Comment::wherePostId($id)->delete();
            $post->delete();
            return back()->withInput();
        } else {
            return view('auth.login');   
        }
    }
}

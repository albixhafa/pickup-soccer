<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SearchRequest;
use App\Post;
use App\User;
use App\Player;
use Faker\Provider\ka_GE\DateTime;
Use Carbon\Carbon;
use App\Http\Requests\PlayerController;
use App\Comment;

class MainpageController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $players = Player::all();
            $radius = 30;
            $latitude = $user->lat;
            $longitude = $user->lng;

            $posts = Post::where('time', '>=', Carbon::today())->select('posts.*')
            ->selectRaw('( 3959 * acos( cos( radians(?) ) *
                            cos( radians( lat ) )
                            * cos( radians( lng ) - radians(?)
                            ) + sin( radians(?) ) *
                            sin( radians( lat ) ) )
                            ) AS distance', [$latitude, $longitude, $latitude])
            ->havingRaw("distance < ?", [$radius])
            ->orderBy('time', 'asc')
            ->get();

            return view('mainpage', compact('posts', 'user', 'players'));
        } else {
            return view('auth.login');   
        }
    }

    public function item(Request $request, $id)
    {
        if(Auth::check())
        {
            $post = Post::findOrFail($id);
            $comments = Comment::wherePostId($id)->paginate(5);
            $players = Player::where('post_id', $id)->get();
            return view('item', compact('post', 'players', 'comments'));
        } else {
            return view('auth.login');   
        }
    }

    public function play(Request $request, $id) 
    {   
        if(Auth::check())
        {
            $existing = Player::wherePostId($id)->whereUserId(Auth::id())->first();
            if (is_null($existing)) {
                $play = Player::create(['post_id' => $id, 'user_id' => Auth::id()]);
            }
            return back()->withInput();
        } else {
            return view('auth.login');   
        }
    }

    public function unplay(Request $request, $id)
    {
        if(Auth::check())
        {
            $unplay = Player::where(['post_id' => $id, 'user_id' => Auth::id()]);
            $unplay->delete();
            return back()->withInput();
        } else {
            return view('auth.login');   
        }
    }
}
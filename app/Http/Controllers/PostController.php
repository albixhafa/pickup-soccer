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

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(12);
        return view('onlyme.posts.index', compact('posts'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $player = Player::wherePostId($id)->delete();
        $post->delete();
        return back()->withInput();
    }
}

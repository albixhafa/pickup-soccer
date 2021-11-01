<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserProfileRequest;
use Intervention\Image\ImageManagerStatic as Image;

use App\User;
use App\Photo;
use App\Gender;
use App\Post;
use App\Player;
use App\Comment;


class UserProfileController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $gender = Gender::pluck('name', 'id')->all();
            return view('profile', compact('user', 'gender'));
        } else {
            return view('auth.login');
        }
    }

    public function update(UserProfileRequest $request, $id)
    {
        if(Auth::check())
        {
            $user = User::findOrFail($id);
            if(trim($request->password) ==''){
                $input = $request->except('password');
            } else {
                $input = $request->all();
                $input['password'] = bcrypt($request->password);
            }

            if($file = $request->file('photo_id')) {
                if($user->photo) {
                    unlink(public_path() . $user->photo->path);
                    $user->photo->delete();
                }

                $name = str_random(8) . $file->getClientOriginalName();
                Image::make($file)->resize(200,200)->save(public_path('/images/' . $name));
                // $file->move('images', $name);
                $photo = Photo::create(['path'=>$name]);
                $input['photo_id'] = $photo->id;

            }
            $user->update($input);
            return redirect()->back();
        } else {
            return view('auth.login');
        }
    }

    public function destroy($id)
    {
        if(Auth::check())
        {
            $user = User::findOrFail($id);
            $player = Player::whereUserId($id)->delete();
            $comment = Comment::whereUserId($id)->delete();
            if($user->photo) {
                unlink(public_path() . $user->photo->path);
                $user->photo->delete();
            }
            $user->delete();
            return redirect('/login');
        } else {
            return view('auth.login');
        }
    }
}
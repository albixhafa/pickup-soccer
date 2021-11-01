<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;

use App\User;
use App\Role;
use App\Photo;
use App\Status;
use App\Gender;
use App\Age;
use App\Player;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('onlyme.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $role = Role::pluck('name', 'id')->all();
        $status = Status::pluck('name', 'id')->all();
        $gender = Gender::pluck('name', 'id')->all();
        return view('onlyme.users.edit', compact('user', 'role', 'status', 'gender'));
    }

    public function update(UserEditRequest $request, $id)
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
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
        return redirect('/onlyme/users');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $player = Player::whereUserId($id)->delete();
        if($user->photo) {
            unlink(public_path() . $user->photo->path);
            $user->photo->delete();
        }
        $user->delete();
        return redirect('/onlyme/users');
    }
}

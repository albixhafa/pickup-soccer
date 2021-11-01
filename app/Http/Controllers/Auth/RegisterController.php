<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Gender;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm() {
        $gender = Gender::pluck('name', 'id')->all();
        return view('auth.register', compact('gender'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|alpha_dash|min:4|max:8|unique:users',
            'email' => 'required|string|email|max:30|unique:users',
            'password' => 'required|string|min:8|max:16|confirmed',
            'formatted_address' => 'required|max:150'
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'gender_id' => $data['gender_id'],
            'formatted_address' => $data['formatted_address'],
            'lat' => $data['lat'],
            'lng' => $data['lng']
        ]);
    }
}

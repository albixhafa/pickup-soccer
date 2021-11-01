<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        $userId = Auth::id();
        return [
            'username'          =>  'alpha_dash|min:4|max:8|unique:users,username,'.$userId,
            'email'             =>  'string|email|min:8|max:30|unique:users,email,'.$userId,
            'password'          =>  'max:10,'.$userId,
            'formatted_address' =>  'max:150,'.$userId,
            'photo_id'          =>  'mimes:jpeg,bmp,png,'.$userId
        ];
    }
}

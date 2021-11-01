<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }

    public function rules() 
    {

        return [

        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Search with at least 4 characters',
            'name.max' => 'Search with 40 characters or less'
        ];
    }
}

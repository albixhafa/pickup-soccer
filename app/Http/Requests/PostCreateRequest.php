<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostCreateRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'time'                  =>'required',
            'format_id'             =>'required',
            'team_number_id'        =>'required',
            'size_id'               =>'required',
            'team_gender_id'        =>'required',
            'note'                  =>'max:500',
            'formatted_address'     =>'required'
        ];
    }
}

<?php

namespace App\Http\Request;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array_merge(
            ['user.username' => 'required'],
            ['user.password' => 'required'],
            User::rules('user.'),
            Client::rules('client.')
        );
    }

    public function messages()
    {
        return array_merge(
            User::messages('user.'),
            Client::messages('client.')
        );
    }
}

<?php

namespace App\Http\Request;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $clientId = $this->route()->parameter('clientId') * 1;
        return array_merge(
            ['user.username' => 'required', Rule::unique('user')->ignore($clientId)],
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

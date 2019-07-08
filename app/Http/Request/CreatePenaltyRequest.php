<?php

namespace App\Http\Request;

use App\Models\Client;
use App\Models\Penalty;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreatePenaltyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Penalty::rules();
    }

    public function messages()
    {
        return Penalty::messages();
    }
}

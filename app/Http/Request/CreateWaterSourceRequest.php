<?php

namespace App\Http\Request;

use App\Models\Client;
use App\Models\User;
use App\Models\WaterSource;
use Illuminate\Foundation\Http\FormRequest;

class CreateWaterSourceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return WaterSource::rules();
    }

    public function messages()
    {
        return WaterSource::messages();
    }
}

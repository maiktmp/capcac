<?php

namespace App\Http\Request;

use App\Models\WaterSource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWaterSourceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $waterSourceId = $this->route()->parameter('waterSourceId') * 1;
        return array_merge(
            ['number' => 'numeric|required|unique:water_source,number,' . $waterSourceId],
            WaterSource::rules()
        );
    }

    public function messages()
    {
        return WaterSource::messages();
    }
}

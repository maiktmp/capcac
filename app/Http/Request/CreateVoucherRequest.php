<?php

namespace App\Http\Request;

use App\Models\Client;
use App\Models\Penalty;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Foundation\Http\FormRequest;

class CreateVoucherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Voucher::rules();
    }

    public function messages()
    {
        return Voucher::messages();
    }
}

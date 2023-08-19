<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActiveTimeRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'from_day'  => ['required'],
            'to_day'    => ['required'],
            'from_time' => ['required'],
            'to_time'   => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

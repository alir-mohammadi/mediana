<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CallLogRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone_number' => ['required', 'integer'],
            'meta_data' => ['nullable'],
            'from' => ['required'],
            'duration' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

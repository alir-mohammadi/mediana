<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneNumberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone_number' => ['required'],
            'owner_id' => ['required', 'integer'],
            'active' => ['required'],
            'package' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

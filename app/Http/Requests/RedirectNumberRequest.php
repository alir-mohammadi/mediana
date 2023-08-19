<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedirectNumberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'number' => ['required', 'integer'],
            'phone_number_id' => ['required', 'integer'],
            'redirect_phone_number' => ['required'],
            'backup_redirect_phone_number' => ['required'],
            'active' => ['required'],
            'title' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

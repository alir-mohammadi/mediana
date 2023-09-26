<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerificationCodeRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'user_id'   => ['required'],
            'otp'       => ['required'],
            'expire_at' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

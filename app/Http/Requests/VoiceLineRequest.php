<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoiceLineRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'type'            => ['required'],
            'name'            => ['required'],
            'phone_number_id' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

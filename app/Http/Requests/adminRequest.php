<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'      => ['required'],
            'user_name' => ['required'],
            'password'  => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPackageRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'user_id'           => ['required', 'integer'],
            'package_id'        => ['required', 'integer'],
            'remaining_seconds' => ['required', 'integer'],
            'expire_at'         => ['required', 'date'],
            'started_at'        => ['required', 'date'],
            'active'            => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

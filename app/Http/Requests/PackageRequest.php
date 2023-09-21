<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'type'     => ['required'],
            'price'    => ['required'],
            'duration' => ['required', 'integer'],
            'seconds'  => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

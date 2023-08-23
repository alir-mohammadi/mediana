<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperatorRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'phone_number'    => ['required'],
            'phone_number_id' => ['required', 'integer'],
            'name'            => ['required'],
            'active'          => ['required'],
            'outgoing_access' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

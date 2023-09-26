<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'call_id' => ['required'],
            'meta'    => ['required'],
            'creator' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\VerificationCode */
class VerificationCodeResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'         => $this -> id,
            'user_id'    => $this -> user_id,
            'otp'        => $this -> otp,
            'expire_at'  => $this -> expire_at,
            'created_at' => $this -> created_at,
            'updated_at' => $this -> updated_at,
        ];
    }
}

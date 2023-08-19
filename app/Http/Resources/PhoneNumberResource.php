<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\PhoneNumber */
class PhoneNumberResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'phone_number' => $this->phone_number,
            'owner_id' => $this->owner_id,
            'active' => $this->active,
            'package' => $this->package,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

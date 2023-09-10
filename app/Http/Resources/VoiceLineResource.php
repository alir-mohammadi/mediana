<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\VoiceLine */
class VoiceLineResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'              => $this -> id,
            'type'            => $this -> type,
            'name'            => $this -> name,
            'phone_number_id' => $this -> phone_number_id,
            'created_at'      => $this -> created_at,
            'updated_at'      => $this -> updated_at,
        ];
    }
}

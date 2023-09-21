<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Package */
class PackageResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'         => $this -> id,
            'type'       => $this -> type,
            'price'      => $this -> price,
            'duration'   => $this -> duration,
            'seconds'    => $this -> seconds,
            'created_at' => $this -> created_at,
            'updated_at' => $this -> updated_at,
        ];
    }
}

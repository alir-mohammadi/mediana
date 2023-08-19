<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ActiveTime */
class ActiveTimeResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'         => $this -> id,
            'from_day'   => $this -> from_day,
            'to_day'     => $this -> to_day,
            'from_time'  => $this -> from_time,
            'to_time'    => $this -> to_time,
            'created_at' => $this -> created_at,
            'updated_at' => $this -> updated_at,
        ];
    }
}

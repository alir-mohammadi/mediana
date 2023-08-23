<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Operator */
class OperatorResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'              => $this -> id,
            'phone_number'    => $this -> phone_number,
            'phone_number_id' => $this -> phone_number_id,
            'name'            => $this -> name,
            'active'          => $this -> active,
            'outgoing_access' => $this -> outgoing_access,
            'created_at'      => $this -> created_at,
            'updated_at'      => $this -> updated_at,
        ];
    }
}

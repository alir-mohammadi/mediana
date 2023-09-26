<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Feedback */
class FeedbackResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'         => $this -> id,
            'call_id'    => $this -> call_id,
            'meta'       => $this -> meta,
            'creator'    => $this -> creator,
            'created_at' => $this -> created_at,
            'updated_at' => $this -> updated_at,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\UserPackage */
class UserPackageResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'                => $this -> id,
            'user_id'           => $this -> user_id,
            'package_id'        => $this -> package_id,
            'remaining_seconds' => $this -> remaining_seconds,
            'expire_at'         => $this -> expire_at,
            'started_at'        => $this -> started_at,
            'active'            => $this -> active,
            'created_at'        => $this -> created_at,
            'updated_at'        => $this -> updated_at,
        ];
    }
}

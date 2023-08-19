<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\RedirectNumber */
class RedirectNumberResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'phone_number_id' => $this->phone_number_id,
            'redirect_phone_number' => $this->redirect_phone_number,
            'backup_redirect_phone_number' => $this->backup_redirect_phone_number,
            'active' => $this->active,
            'title' => $this->title,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

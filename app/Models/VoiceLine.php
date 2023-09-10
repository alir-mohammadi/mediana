<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoiceLine extends Model
{

    use SoftDeletes, HasFactory;

    protected $fillable = [
        'type',
        'name',
        'phone_number_id',
    ];

    public function PhoneNumber(): BelongsTo
    {
        return $this -> belongsTo(PhoneNumber::class);
    }
}

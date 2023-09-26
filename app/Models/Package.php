<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{

    use SoftDeletes, HasFactory;

    protected $fillable = [
        'type',
        'price',
        'incoming_seconds',
        'outgoing_seconds',
        'duration',
    ];

    public function user(): BelongsToMany
    {
        return $this -> belongsToMany(User::class);
    }
}

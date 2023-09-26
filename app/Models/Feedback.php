<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{

    use SoftDeletes, HasFactory;

    protected $fillable = [
        'call_id',
        'meta',
        'creator',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}

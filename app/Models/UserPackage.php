<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPackage extends Model
{

    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'remaining_seconds',
        'expire_at',
        'started_at',
        'active',
    ];

    protected $casts = [
        'expire_at'  => 'datetime',
        'started_at' => 'datetime',
    ];
}

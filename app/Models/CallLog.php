<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CallLog extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'phone_number',
        'meta_data',
        'from',
        'duration',
    ];

    protected $casts = [
        'meta_data' => 'array',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActiveTime extends Model
{

    use SoftDeletes, HasFactory;

    protected $fillable = [
        'from_day',
        'to_day',
        'from_time',
        'to_time',
    ];
}

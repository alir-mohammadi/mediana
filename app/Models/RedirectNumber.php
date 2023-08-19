<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RedirectNumber extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'number',
        'phone_number_id',
        'redirect_phone_number',
        'backup_redirect_phone_number',
        'active',
        'title',
    ];
}

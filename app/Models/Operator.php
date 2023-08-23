<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operator extends Model
{

    use SoftDeletes, HasFactory;

    protected $fillable = [
        'phone_number',
        'phone_number_id',
        'name',
        'active',
        'outgoing_access',
    ];
}

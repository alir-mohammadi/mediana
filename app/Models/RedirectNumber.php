<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function operator(): HasOne
    {
        return $this -> hasOne(Operator::class, 'id', 'redirect_phone_number');
    }

    public function backupOperator(): HasOne
    {
        return $this -> hasOne(Operator::class, 'id', 'backup_redirect_phone_number');
    }
}

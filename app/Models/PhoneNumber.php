<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneNumber extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'phone_number',
        'owner_id',
        'active',
        'package',
        'direct'
    ];

    public function redirects(): HasMany
    {
        return $this -> hasMany(RedirectNumber::class);
    }

    public function callLogs(): HasMany
    {
        return $this -> hasMany(CallLog::class, 'phone_number');
    }

    public function activeTime(): HasOne
    {
        return $this -> hasOne(ActiveTime::class);
    }

    public function operators(): HasMany
    {
        return $this -> hasMany(Operator::class);
    }

    public function owner(): BelongsTo
    {
        return $this -> belongsTo(User::class, 'owner_id');
    }

    public function voiceLines(): HasMany
    {
        return $this -> hasMany(VoiceLine::class);
    }
}

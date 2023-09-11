<?php

namespace App\Enums;

enum VoiceLine: string
{
    public static function getAllValues(): array
    {
        return collect(array_column(self::cases(),'value'))->mapWithKeys(fn($value) => [$value =>  $value])->toArray();
    }
    case  income = 'income';
    case redirect = 'redirect';
    case deactivate = 'deactivate';
}

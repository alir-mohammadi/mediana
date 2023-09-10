<?php

namespace App\Enums;

enum VoiceLine: string
{
    public static function getAllValues(): array
    {
        return array_column(self::cases(), 'value');
    }
    case  income = 'income';
    case redirect = 'redirect';
    case deactivate = 'deactivate';
}

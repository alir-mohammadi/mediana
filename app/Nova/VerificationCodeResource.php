<?php

namespace App\Nova;

use App\Models\VerificationCode;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class VerificationCodeResource extends Resource
{

    public static $model = VerificationCode::class;

    public static $title = 'id';

    public static $search = [
        'id', 'user_id', 'otp', 'expire_at',
    ];

    public function fields(Request $request): array
    {
        return [
            ID ::make() -> sortable(),

            Text ::make('User Id')
                -> sortable(),

            Text ::make('Otp')
                -> sortable(),

            Text ::make('Expire At')
                -> sortable(),
        ];
    }

    public function cards(Request $request): array
    {
        return [];
    }

    public function filters(Request $request): array
    {
        return [];
    }

    public function lenses(Request $request): array
    {
        return [];
    }

    public function actions(Request $request): array
    {
        return [];
    }
}

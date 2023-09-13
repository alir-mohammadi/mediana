<?php

namespace App\Nova;

use App\Models\Operator;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class OperatorResource extends Resource
{

    public static $model = Operator::class;

    public static $title = 'name';

    public static $search = [
        'id', 'phone_number', 'name',
    ];

    public function fields(Request $request): array
    {
        return [
            ID ::make() -> sortable(),

            Text ::make('Phone Number')
                -> sortable(),

            Number ::make('Phone Number Id')
                -> sortable(),

            Text ::make('Name')
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

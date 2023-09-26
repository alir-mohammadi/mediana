<?php

namespace App\Nova;

use App\Models\Package;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class PackageResource extends Resource
{

    public static $model = Package::class;

    public static $title = 'type';

    public static $search = [
        'id', 'type', 'price',
    ];

    public function fields(Request $request): array
    {
        return [
            ID ::make() -> sortable(),

            Text ::make('Type')
                -> sortable(),

            Text ::make('Price')
                -> sortable(),

            Number ::make('Incoming Seconds')
                -> sortable(),

            Number ::make('Outgoing Seconds')
                -> sortable(),

            Number ::make('Duration' )
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

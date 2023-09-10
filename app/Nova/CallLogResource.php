<?php

namespace App\Nova;

use App\Models\CallLog;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class CallLogResource extends Resource
{

    public static $model = CallLog::class;

    public static $title = 'id';

    public static $search = [
        'id', 'from', 'duration',
    ];


    public function fields(Request $request): array
    {
        return [
            ID ::make() -> sortable(),

            Number ::make('Phone Number')
                -> sortable(),

            Text ::make('From')
                -> sortable(),

            Text ::make('Duration')
                -> sortable(),
            KeyValue::make('Meta','meta_data')->rules('json'),
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

    public function authorizedToUpdate(Request $request)
    {
        return false;
    }
    public function authorizedToDelete(Request $request)
    {
        return false;
    }
}

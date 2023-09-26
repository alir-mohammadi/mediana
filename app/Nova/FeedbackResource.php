<?php

namespace App\Nova;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class FeedbackResource extends Resource
{

    public static $model = Feedback::class;

    public static $title = 'id';

    public static $search = [
        'id', 'call_id', 'creator',
    ];

    public function fields(Request $request): array
    {
        return [
            ID ::make() -> sortable(),

            Text ::make('Call Id')
                -> sortable(),

            Text ::make('Creator')
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

<?php

namespace App\Nova;

use App\Enums\VoiceLine as EnumsVoiceLine;
use App\Models\VoiceLine;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class VoiceLineResource extends Resource
{

    public static $model = VoiceLine::class;

    public static $title = 'name';

    public static $displayInNavigation = false;
    public static $search = [
        'id', 'type', 'name', 'phone_number_id',
    ];

    public function fields(Request $request): array
    {
        return [
            ID ::make() -> sortable(),

            Select::make('Type','type')->options(EnumsVoiceLine::getAllValues()),

            Text ::make('Name')
                -> sortable()
                -> rules('required'),

            BelongsTo ::make('Phone Number', 'phoneNumber', PhoneNumbers::class)
                -> sortable()
                -> rules('required'),
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

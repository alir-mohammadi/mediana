<?php

namespace App\Nova;

use App\Enums\VoiceLine;
use Ganyicz\NovaCallbacks\HasCallbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use KirschbaumDevelopment\NovaInlineRelationship;
use Illuminate\Validation\Rules;

class Customer extends Resource
{
     use HasCallbacks;
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name','name')->sortable(),
            HasMany::make('Phone Numbers', 'phoneNumbers', PhoneNumbers::class),
            Number::make('Phone Number','email')->sortable(),
            Password::make('Password','password')->default(Str::password(8))->onlyOnForms(),
            Number::make('directNumber','phoneNumber')->onlyOnForms() ->fillUsing(function () {
                // Leaving this function empty will prevent Nova from setting this field
            }),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $model
     *
     * @return void
     */
    public static function afterCreate(Request $request, $model)
    {
        $model->phoneNumbers()->create(['phone_number' => $request->input('phoneNumber')]);

        $line = $model->phoneNumbers()->firstOrFail();

        $operator = $line->operators()->create([
            'phone_number_id' => $model->email,
            'outgoing_access' => true,
            'active' => true,
            'name' => $model->name,
        ]);

        $redirects = [];

        for ($i = 1; $i < 3; $i++) {
            $redirects[] = [
                'number' => $i,
                'redirect_phone_number' => $operator->id,
                'backup_redirect_phone_number' => null,
                'active' => true,
                'title' => null,
            ];
        }

        $line->redirects()->createMany($redirects);

        $line->voiceLines()->createMany([
            [
                'type' => VoiceLine::income,
                'name' => config('voice.income.default')
            ],
            [
                'type' => VoiceLine::deactivate,
                'name' => config('voice.deactivate.default')
            ],
        ]);
    }

}

<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('test', function () {
    foreach (config('voice') as $key =>$v)
    {
        if (!empty(\App\Models\User::find($key)?->phoneNumbers()?->first()?->id)) {
            \App\Models\VoiceLine ::create([
                'type'            => \App\Enums\VoiceLine::income,
                'name'            => $v,
                'phone_number_id' => \App\Models\User ::find($key) ?-> phoneNumbers() ?-> first() ?-> id
            ]);
        }
    }
})->purpose('test');

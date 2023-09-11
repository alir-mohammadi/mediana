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
    foreach (\App\Models\RedirectNumber::all() as $key =>$v)
    {
        $operator = \App\Models\Operator::query()->where('phone_number_id', $v->phone_number_id)->where('phone_number', $v->redirect_phone_number)->first();
        $operatorB = \App\Models\Operator::query()->where('phone_number_id', $v->phone_number_id)->where('phone_number', $v->backup_redirect_phone_number)->first();

        $v->update([
            'redirect_phone_number' => $operator?->id,
            'backup_redirect_phone_number' => $operatorB?->id,
        ]);
    }
})->purpose('test');

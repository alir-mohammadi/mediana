<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('call')->group(function () {
    Route ::post('/incoming', [\App\Http\Controllers\CallController::class, 'incoming']) -> name('incoming');
    Route ::post('/redirect', [\App\Http\Controllers\CallController::class, 'redirect']) -> name('redirect');
    Route ::post('/outgoing/access', [\App\Http\Controllers\CallController::class, 'outAccess']) -> name('out-access');
    Route ::post('/outgoing/line', [\App\Http\Controllers\CallController::class, 'outLine']) -> name('out-line');
    Route ::post('/outgoing/hangup', [\App\Http\Controllers\CallController::class, 'hangup']) -> name('out-hangup');
    Route ::post('/hangup', [\App\Http\Controllers\CallController::class, 'hangout']) -> name('hangout');
});

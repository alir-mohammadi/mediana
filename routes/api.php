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
    Route ::get('/incoming', [\App\Http\Controllers\CallController::class, 'incoming']) -> name('incoming');
    Route ::get('/redirect', [\App\Http\Controllers\CallController::class, 'redirect']) -> name('redirect');
    Route ::get('/outgoing/access', [\App\Http\Controllers\CallController::class, 'outAccess']) -> name('out-access');
    Route ::get('/outgoing/line', [\App\Http\Controllers\CallController::class, 'outLine']) -> name('out-line');
    Route ::post('/hangout', [\App\Http\Controllers\CallController::class, 'hangout']) -> name('hangout');
});

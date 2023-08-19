<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard',[\App\Http\Controllers\PanelController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/phone-settings',[\App\Http\Controllers\PanelController::class,'phoneSettings'])->middleware(['auth', 'verified'])->name('phone-settings');
Route::get('/internal-settings',[\App\Http\Controllers\PanelController::class,'internalSettings'])->middleware(['auth', 'verified'])->name('internal-settings');
Route::get('/timesheet-settings',[\App\Http\Controllers\PanelController::class,'timesheetSettings'])->middleware(['auth', 'verified'])->name('timesheet-settings');
Route::get('/contacts',[\App\Http\Controllers\PanelController::class,'contacts'])->middleware(['auth', 'verified'])->name('contacts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

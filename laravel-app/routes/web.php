<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LifeController;
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

Route::view('/','homepage')->name('homepage');

Route::get('/life/{lifeId?}', [LifeController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('life');

Route::post('/life', [LifeController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('new-life');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

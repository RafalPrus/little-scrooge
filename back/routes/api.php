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

Route::middleware('auth:sanctum')->group(function() {
    Route::get('user', function (Request $request) {
        return auth()->user();
    })->name('auth.dashboard');

    Route::get('lottery', [\App\Http\Controllers\Api\Auth\LotteryController::class, 'show'])
        ->name('auth.lottery');

    Route::post('logout', [\App\Http\Controllers\Api\Auth\AuthSessionController::class, 'destroy'])
        ->name('auth.logout');
});

Route::middleware('guest')->group(function () {
    Route::post('register', [\App\Http\Controllers\Api\Auth\UserController::class, 'store'])
        ->name('guest.register');

    Route::post('login', [\App\Http\Controllers\Api\Auth\AuthSessionController::class, 'store'])
        ->name('guest.login');
});


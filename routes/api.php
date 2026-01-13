<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MachineController;

Route::prefix('v1')
    ->name('api.')
    ->group(function () {
        Route::apiResource('machines', MachineController::class);
    });
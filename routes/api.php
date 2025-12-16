<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource(name: 'v1/machines',controller: App\http\Controllers\Api\v1\MachineController::class);

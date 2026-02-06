<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MachineProductController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

Route::get('/dashboard', [DashboardController::class, 'index'])

    ->name('dashboard');

Route::resource('machine-products', MachineProductController::class);

Route::get('/notifications', function () {
        return view('notifications.index');
    })->name('notifications.index');

Route::patch('/notifications/{id}/read', function ($id) {
        $notification = Auth::user()
            ->notifications()
            ->where('id', $id)
            ->firstOrFail();

        $notification->markAsRead();

        return back();
    })->name('notifications.read');
    
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

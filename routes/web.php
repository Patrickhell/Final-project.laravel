<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\User\DashboardController as DashboardPagesController;
use App\Http\Controllers\User\DoctorController as DoctorProfileDashboardController;
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

Route::middleware(['auth', 'check.profile'])->prefix('dashboard')->name('user.')->group(function () {
    Route::get('/', [DashboardPagesController::class, 'index'])->name('dashboard');
    Route::get('/messages', [DashboardPagesController::class, 'messagesIndex'])->name('messages');
    Route::get('/reviews', [DashboardPagesController::class, 'reviewsIndex'])->name('reviews');
    Route::get('/stats', [DashboardPagesController::class, 'statsIndex'])->name('stats');

    // Custom routes for doctor
    Route::get('/create-profile', [DoctorProfileDashboardController::class, 'create'])->name('create');
    Route::post('/store-profile', [DoctorProfileDashboardController::class, 'store'])->name('store');
    Route::get('/edit-profile', [DoctorProfileDashboardController::class, 'edit'])->name('edit');
    Route::put('/update-profile', [DoctorProfileDashboardController::class, 'update'])->name('update');
    Route::get('/show-profile', [DoctorProfileDashboardController::class, 'show'])->name('show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

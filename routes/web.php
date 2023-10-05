<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AdminController;
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

Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('user.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/messages', [AdminController::class, 'messagesIndex'])->name('messages');
    Route::get('/reviews', [AdminController::class, 'reviewsIndex'])->name('reviews');
    Route::get('/stats', [AdminController::class, 'statsIndex'])->name('stats');

    // Custom routes for doctor
    Route::get('/create-profile', [AdminController::class, 'create'])->name('create');
    Route::get('/store-profile', [AdminController::class, 'store'])->name('store');
    Route::get('/edit-profile', [AdminController::class, 'edit'])->name('edit');
    Route::put('/update-profile', [AdminController::class, 'update'])->name('update');
    Route::get('/show-profile', [AdminController::class, 'show'])->name('show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


<?php

use App\Http\Controllers\Api\DoctorController as ApiDoctorController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/doctors', [ApiDoctorController::class, 'index'])->name('api.doctors.index');

Route::get('/doctors/{id}', [ApiDoctorController::class, 'show'])->name('api.doctors.show');

//routes for braintree payment
Route::get('/payment/token', [PaymentController::class, 'getToken'])->name('api.payment.token');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('api.process.payment');




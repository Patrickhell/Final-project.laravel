<?php

use App\Http\Controllers\Api\DoctorController as ApiDoctorController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\Order\ProdutController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/doctors', [ApiDoctorController::class, 'index'])->name('api.doctors.index');
Route::get('/doctors/{name}', [ApiDoctorController::class, 'show'])->name('api.doctors.show');

//routes for braintree payment
Route::get('sponsorships', [ProdutController::class, 'index'])->name('api.sponsorship');
Route::get('/payment/token', [OrderController::class, 'generate'])->name('api.generate');
Route::post('/make/payment', [OrderController::class, 'makePayment'])->name('api.make.payment');


// routes for mail
Route::post('/contact-form' , [LeadController::class, 'store'])->name('api.contact-form');

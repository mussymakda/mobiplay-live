<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaymentController;



Route::get('command:clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return "config, cache, and view cleared successfully";
});

Route::get('command:config', function () {
    Artisan::call('config:cache');
    return "config cache successfully";
});

Route::get('command:key', function () {
    Artisan::call('key:generate');
    return "Key generate successfully";
});

Route::get('command:migrate', function () {
    Artisan::call('migrate');
    return "Database migration generated";
});

Route::get('command:migrate_refresh', function () {
    Artisan::call('migrate:refresh');
    return "Database migration generated";
});

// Authentication Routes
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/login', [AuthController::class, 'index'])->name('index');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Signup Routes
Route::get('/signup', [RegistrationController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [RegistrationController::class, 'handleSignup'])->name('signup.handle');

// Additional Routes for Signup Steps
Route::get('/signup/organization-info', [RegistrationController::class, 'showOrganizationInfoForm'])->name('signup.organization.form');
Route::post('/signup/organization-info', [RegistrationController::class, 'handleOrganizationInfo'])->name('signup.organization.handle');

Route::get('/signup/phone-verification', [RegistrationController::class, 'showPhoneVerificationForm'])->name('signup.phone.form');
Route::post('/signup/phone-verification', [RegistrationController::class, 'handlePhoneVerification'])->name('signup.phone.handle');

Route::get('/signup/location', [RegistrationController::class, 'showLocationForm'])->name('signup.location.form');
Route::post('/signup/location', [RegistrationController::class, 'handleLocation'])->name('signup.location.handle');

Route::get('/signup/account', [RegistrationController::class, 'showAccountForm'])->name('signup.account.form');
Route::post('/signup/account', [RegistrationController::class, 'handleAccount'])->name('signup.account.handle');

// Payment Routes
Route::get('/make-payment', function () {
    return view('make-payment');
})->middleware('auth')->name('payment.make');

Route::get('/make-payment', [PaymentController::class, 'showMakePaymentForm'])->middleware('auth')->name('payment.make');
Route::post('/paypal', [PaymentController::class, 'processPayment'])->name('payment.process'); // Updated to match route name
Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment-cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
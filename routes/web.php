<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ---------- HOME ----------
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// ---------- SIGNUP CHOICE ----------
Route::get('/signup', function () {
    return view('pages.register');
})->name('signup.choice');

// ---------- DONOR REGISTER ----------
Route::get('/register/donor', [AuthController::class, 'showDonorRegisterForm'])
    ->name('register.donor');

// ---------- ORGANIZATION REGISTER ----------
Route::get('/register/organization', [AuthController::class, 'showOrganizationRegisterForm'])
    ->name('register.organization');

// ---------- REGISTER POST ----------
Route::post('/register', [AuthController::class, 'register'])
    ->name('register.post');

// ---------- LOGIN FORM ----------
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

// ---------- LOGIN POST ----------
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');

// ---------- LOGOUT ----------
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

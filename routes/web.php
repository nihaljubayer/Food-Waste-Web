<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Home page
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Signup Choice Page
Route::get('/signup', function () {
    return view('pages.register');   // যেখানে donor/organization choose page আছে
})->name('signup.choice');

// Donor Register Form
Route::get('/register/donor', [AuthController::class, 'showDonorRegisterForm'])
    ->name('register.donor');

// Organization Register Form
Route::get('/register/organization', [AuthController::class, 'showOrganizationRegisterForm'])
    ->name('register.organization');

// Registration POST
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Login Page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Login POST
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

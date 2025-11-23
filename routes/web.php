<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('pages.home');
})->name('home');


Route::get('/signup', function () {
    return view('pages.register');  
})->name('signup.choice');


Route::get('/register/donor', [AuthController::class, 'showDonorRegisterForm'])
    ->name('register.donor');


Route::get('/register/organization', [AuthController::class, 'showOrganizationRegisterForm'])
    ->name('register.organization');


Route::post('/register', [AuthController::class, 'register'])->name('register.post');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


Route::post('/login', [AuthController::class, 'login'])->name('login.post');


Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

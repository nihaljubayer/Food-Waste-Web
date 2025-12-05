<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Donor\DashboardController as DonorDashboardController;
use App\Http\Controllers\Donor\FoodPostController;
use App\Http\Controllers\NgoController;
use App\Http\Controllers\NgoOrderController;


// ====================== PUBLIC ROUTES ======================

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

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.post');

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');


// ====================== ADMIN ROUTES ======================

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');
    });


// ====================== DONOR ROUTES ======================

Route::middleware('auth')
    ->prefix('donor')
    ->name('donor.')
    ->group(function () {

        // Donor dashboard
        Route::get('/dashboard', [DonorDashboardController::class, 'index'])
            ->name('dashboard');

        // Post new food
        Route::get('/food/create', [FoodPostController::class, 'create'])
            ->name('food.create');

        Route::post('/food', [FoodPostController::class, 'store'])
            ->name('food.store');

        // My donations list
        Route::get('/donations', [FoodPostController::class, 'myDonations'])
            ->name('donations');


        // ================== PICKUP MODULE (FRONTEND ONLY) ==================
        // Your actual view path: resources/views/pages/donor/pickups/create.blade.php
        Route::view('/pickups/create', 'pages.donor.pickups.create')
            ->name('pickups.create');

        // Your actual view path: resources/views/pages/donor/pickups/index.blade.php
        Route::view('/pickups', 'pages.donor.pickups.index')
            ->name('pickups.index');
    });






// ====================== NGO ROUTES ======================



Route::get('/ngo/dashboard', [NgoController::class, 'index'])
    ->name('ngo.dashboard')
    ->middleware('auth');

Route::view('/ngo/profile', 'pages.ngos.profile')
    ->name('ngo.profile')
    ->middleware('auth');

// Orders (jodi controller diye set kora thake)
Route::get('/ngo/orders', [\App\Http\Controllers\NgoOrderController::class, 'index'])
    ->name('ngo.orders')
    ->middleware('auth');

// Settings page dekhano (GET)
Route::view('/ngo/settings', 'pages.ngos.settings')
    ->name('ngo.settings')
    ->middleware('auth');

// Settings form submit (POST)  👈 ei line ta NOTUN
Route::post('/ngo/settings', [NgoController::class, 'updateSettings'])
    ->name('ngo.settings.update')
    ->middleware('auth');
// Update order status (PATCH) 👈 ei line ta NOTUN
    Route::patch('/ngo/orders/{order}/status', [NgoOrderController::class, 'updateStatus'])
    ->name('ngo.orders.updateStatus')
    ->middleware('auth');




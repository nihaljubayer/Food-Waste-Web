<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Donor\DashboardController as DonorDashboardController;
use App\Http\Controllers\Donor\FoodPostController;




Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/signup', function () {
    return view('pages.register');   // registration choice page
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

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
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

        // ⭐ My donations list
        Route::get('/donations', [FoodPostController::class, 'myDonations'])
            ->name('donations');
    });





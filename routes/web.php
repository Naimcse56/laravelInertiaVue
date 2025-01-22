<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Models\User;

// Route::get('/about', function () {
//     sleep(2);
//     return inertia('About', ['user' => 'Deamon']);
// });

Route::inertia('/', 'Home')->name('home');
Route::middleware(['guest'])->group(function () {
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register',[AuthController::class, 'register'])->name('register');
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login',[AuthController::class, 'login'])->name('login');
});
Route::middleware(['auth'])->group(function () {
    Route::inertia('/users-list', 'User', ['users' => User::paginate(6)])->name('user_list');
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::post('/update-profile',[AuthController::class, 'update_profile'])->name('update_profile');
});
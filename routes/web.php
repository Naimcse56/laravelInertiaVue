<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;

// Route::get('/about', function () {
//     sleep(2);
//     return inertia('About', ['user' => 'Deamon']);
// });

Route::inertia('/', 'Home')->name('home');
Route::inertia('/register', 'Auth/Register')->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register');
Route::inertia('/login', 'Auth/Login')->name('login');
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

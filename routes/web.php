<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;

// Route::get('/about', function () {
//     sleep(2);
//     return inertia('About', ['user' => 'Deamon']);
// });

Route::inertia('/', 'Home')->name('home');
Route::inertia('/register', 'Register')->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register');

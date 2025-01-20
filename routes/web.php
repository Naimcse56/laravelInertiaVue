<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/about', function () {
//     sleep(2);
//     return inertia('About', ['user' => 'Deamon']);
// });

Route::inertia('/', 'Home')->name('home');
Route::inertia('/about', 'About', ['user' => 'Deamon'])->name('about');
Route::inertia('/another-layout', 'AnotherLayout', ['user' => 'Another Layout'])->name('another_layout');

<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/about', function () {
//     return inertia('About', ['user' => 'Deamon']);
// });

Route::inertia('/', 'Home');
Route::inertia('/about', 'About', ['user' => 'Deamon']);

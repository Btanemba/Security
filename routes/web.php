<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth','verified']);

Route::view('/profile/edit', 'profile.edit')->middleware('auth');

Route::view('/profile/password', 'profile.password')->middleware('auth');

Route::middleware(['admin.only'])->group(function () {
    // Define your admin panel routes here
});

use App\Http\Controllers\UniversityController;

Route::post('universities', [UniversityController::class, 'store'])->name('universities.store');

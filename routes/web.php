<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::middleware(['auth'])->group(function () {
    Route::get('/basket', function () {
        return view('basket');
    })->name('basket');
});

Route::get('/where', function () {
    return view('where');
})->name('where');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

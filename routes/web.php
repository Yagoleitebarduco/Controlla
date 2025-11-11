<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Rota de Login de Usuario
Route::get('/', [AuthController::class, 'showToFormLogin'])->name('login');

Route::get('/register', [AuthController::class, 'showToFormRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
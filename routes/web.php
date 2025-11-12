<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

// Rota da Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rota de Login de Usuario
Route::get('/login', [AuthController::class, 'showToFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas de Registro de Usuario
Route::get('/register', [AuthController::class, 'showToFormRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rotas de Acesso Autenticado
Route::middleware('auth')->group(function () {
    Route::get('/user', [UserController::class, 'dashboard'])->name('user.dashboard');
});
<?php


use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Rota da Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rota de Login de Usuario
Route::get('/', [AuthController::class, 'showToFormLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas de Registro de Usuario
Route::get('/register', [AuthController::class, 'showToFormRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rotas de Acesso Autenticado
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});
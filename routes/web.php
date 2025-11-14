<?php


use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistroTransaçãoController;

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
    Route::get('/user/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Tela de Registro de Transação
    ## Rota de Registro de Transação
    Route::get('/user/registroTransacao', [RegistroTransaçãoController::class, 'showToRegistroTransacao'])->name('registroTransacao');
    Route::post('/user/registroTransacao', [RegistroTransaçãoController::class, 'store']);
});
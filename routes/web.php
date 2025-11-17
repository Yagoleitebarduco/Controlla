<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterTransactionController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController; // <<< Importação obrigatória

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
    Route::get('/user/registerTransaction', [RegisterTransactionController::class, 'showToRegisterTransaction'])->name('registerTransaction');
    Route::post('/user/registerTransaction', [RegisterTransactionController::class, 'store']);

    // Tela de Estoque
    Route::get('/user/stock', [StockController::class, 'showToStock'])->name('stock');
    Route::get('/user/stock/create', [StockController::class, 'showToCreateItemStock'])->name('create.stock');
    Route::post('/user/stock/create', [StockController::class, 'store']);
    Route::get('/user/stock/{product}/edit', [StockController::class, 'showToEditStock'])->name('edit.stock');
    Route::put('/user/stock/{product}', [StockController::class, 'update'])->name('update.stock');
    Route::delete('/user/stock/{product}', [StockController::class, 'destroy'])->name('delete.stock');

    // Tela de Relatórios (CORRIGIDA)
    Route::prefix('relatorios')->name('reports.')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/gerar', [ReportController::class, 'generate'])->name('generate');
        Route::post('/baixar', [ReportController::class, 'download'])->name('download');
    });

    // Tela de Usuario
    Route::get('/user/userProfile', [UserController::class, 'showToUser'])->name('user.profile');
});
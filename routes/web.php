<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AsideController;

// Rota do App
Route::get('/', [HomeController::class, 'index']);

// Rotas Do SideBar
# Rota da Dashboard
Route::get('/', [AsideController::class, 'dashboard'])->name('painel.index');
# Rota dos Relatoios
Route::get('/relatorios', [AsideController::class, 'relatorios'])->name('relatorios.index');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PainelController;

// Rota do App
Route::get('/', [HomeController::class, 'index']);

// Rota do Painel Principal
Route::get('/painel', [PainelController::class, 'index'])->name('painel.index');
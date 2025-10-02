<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AsideController;

// Rota do App
Route::get('/', [HomeController::class, 'index']);

// Rota do Painel Principal
Route::get('/', [AsideController::class, 'dashboard'])->name('painel.index');
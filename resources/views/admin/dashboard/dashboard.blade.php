@extends('layouts.app')
@section('title-page')
    - Dashboard
@endsection


@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Conteúdo da Dashboard -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-prussianBlue">Visão Geral</h2>
        <p class="text-PaynesGray">Acompanhe as métricas principais do seu negócio.</p>
    </div>

    <!-- Exemplo de Cards de Métricas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-white p-5 rounded-xl shadow-lg border-l-4 border-hookersGreen">
            <p class="text-sm font-medium text-PaynesGray uppercase">Receita Mensal</p>
            <p class="text-3xl font-bold text-richBlack mt-1">R$ 15.450,00</p>
        </div>
        <!-- Card 2 -->
        <div class="bg-white p-5 rounded-xl shadow-lg border-l-4 border-indigoDye">
            <p class="text-sm font-medium text-PaynesGray uppercase">Despesas</p>
            <p class="text-3xl font-bold text-richBlack mt-1">R$ 3.120,00</p>
        </div>
        <!-- Card 3 -->
        <div class="bg-white p-5 rounded-xl shadow-lg border-l-4 border-prussianBlue">
            <p class="text-sm font-medium text-PaynesGray uppercase">Lucro</p>
            <p class="text-3xl font-bold text-richBlack mt-1">R$ 12.330,00</p>
        </div>
        <!-- Card 4 -->
        <div class="bg-white p-5 rounded-xl shadow-lg border-l-4 border-hookersGreen">
            <p class="text-sm font-medium text-PaynesGray uppercase">Estoque Baixo</p>
            <p class="text-3xl font-bold text-richBlack mt-1">12 Itens</p>
        </div>
    </div>
@endsection

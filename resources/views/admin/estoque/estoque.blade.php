@extends('layouts.app')
@section('title-page')
    - Estoque
@endsection
@section('title')
    Controle de Estoque
@endsection

@section('button-header')
    <!-- NOVO: Botão Novo Produto (Visível em SM+ ) -->
    <a href="{{ route('create.stock') }}"
        class="hidden sm:flex items-center py-2 px-4 border border-transparent rounded-lg shadow-md 
                        text-sm font-semibold text-white bg-hookersGreen hover:bg-prussianBlue 
                        transition duration-150 ease-in-out whitespace-nowrap">
        <i class="fas fa-plus mr-2"></i>
        Novo Produto
    </a>
@endsection

@section('content')
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Área de Conteúdo Principal -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-prussianBlue">Visão Geral do Estoque</h2>
                <p class="text-PaynesGray">Acompanhe a situação atual do seu inventário.</p>
            </div>

            <!-- Cards de Métricas de Estoque -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

                <!-- Card 1: Total de Produtos em Estoque -->
                <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-indigoDye flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-PaynesGray uppercase">Produtos em Estoque</p>
                        <p class="text-3xl font-bold text-richBlack mt-1">{{ $totalProducts }}</p>
                    </div>
                    <i class="fas fa-boxes-stacked text-4xl text-indigoDye/60"></i>
                </div>

                <!-- Card 2: Valor Total em Produtos -->
                <div
                    class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-green-500 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-PaynesGray uppercase">Valor Total em Produtos</p>
                        <p class="text-3xl font-bold text-richBlack mt-1">R$ {{ $addedValue }}</p>
                    </div>
                    <i class="fas fa-tags text-4xl text-prussianBlue/60"></i>
                </div>

                <!-- Card 3: Produtos em Falta (Alerta) -->
                <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-red-500 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-PaynesGray uppercase">Produtos em Falta</p>
                        <p class="text-3xl font-bold text-richBlack mt-1">{{ $belowMinimun }}</p>
                    </div>
                    <i class="fas fa-triangle-exclamation text-4xl text-danger/60"></i>
                </div>
            </div>

            <!-- Próxima Seção: Tabela ou Ações -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold text-prussianBlue mb-4">Gerenciamento de Inventário</h3>

                <!-- Tabela Responsiva -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 rounded-xl">
                        <thead class="bg-gray-200 text-black">
                            <tr>
                                <th scope="col"
                                    class="px-6 text-center py-3 text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                    Cod
                                </th>
                                <th scope="col"
                                    class="px-6 text-center py-3 text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                    Nome do Produto
                                </th>
                                <th scope="col"
                                    class="px-6 text-center py-3 text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                    Categoria
                                </th>
                                <th scope="col"
                                    class="px-6 text-center py-3 text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                    Estoque Atual
                                </th>
                                <th scope="col"
                                    class="px-6 text-center py-3 text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                    Estoque Mínimo
                                </th>
                                <th scope="col"
                                    class="px-6 text-center py-3 text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                    Valor Unitário
                                </th>
                                <th scope="col"
                                    class="px-6 text-center py-3 text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Produto 1: Estoque OK -->
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 text-center py-4 whitespace-nowrap text-sm font-medium text-richBlack">
                                        {{ $product->cod }}
                                    </td>
                                    <td
                                        class="px-6 text-center py-4 whitespace-nowrap text-sm text-prussianBlue font-medium">
                                        {{ $product->name_product }}
                                    </td>
                                    <td class="px-6 text-center py-4 whitespace-nowrap text-sm text-PaynesGray ">
                                        {{ $product->Category->category }}
                                    </td>
                                    @if ($product->max_stock < $product->min_stock)
                                        <td
                                            class="px-6 text-center py-4 whitespace-nowrap text-sm font-semibold text-red-500">
                                            {{ $product->max_stock }} {{ $product->unit_measure }}
                                        </td>
                                    @else
                                        <td
                                            class="px-6 text-center py-4 whitespace-nowrap text-sm font-semibold text-green-500">
                                            {{ $product->max_stock }} {{ $product->unit_measure }}
                                        </td>
                                    @endif
                                    <td class="px-6 text-center py-4 whitespace-nowrap text-sm text-PaynesGray">
                                        {{ $product->min_stock }} {{ $product->unit_measure }}
                                    </td>
                                    <td class="px-6 text-center py-4 whitespace-nowrap text-sm text-richBlack">
                                        R$ {{ $product->unit_value }}
                                    </td>
                                    <td class="flex px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2 justify-center">
                                        <a href="{{ route('edit.stock', $product) }}"
                                            class="text-indigoDye hover:text-prussianBlue transition duration-150 cursor-pointer">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('delete.stock', $product) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="inline-block hover:text-red-500 transition duration-300"
                                                class="text-danger hover:text-dangerRed transition duration-150 cursor-pointer">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection

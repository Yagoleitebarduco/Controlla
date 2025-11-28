@extends('layouts.app')
@section('title-page')
    - Painel Principal
@endsection


@section('title')
    Painel Principal
@endsection
@section('content')
    <!-- Área de Conteúdo (Dashboard) -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

        <!-- Visão Geral -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-prussianBlue">Visão Geral</h2>
            <p class="text-PaynesGray">Acompanhe as métricas principais do seu negócio.</p>
        </div>

        <!-- 1. CARDS DE MÉTRICAS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

            <!-- Card 1: Total em Caixa -->
            <div class="bg-white p-5 rounded-xl shadow-lg border-b-4 border-indigoDye flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-PaynesGray uppercase">Total em Caixa</p>
                    <p class="text-3xl font-bold text-richBlack mt-1">R$ 42.567,00</p>
                    <p class="text-xs text-green-500 mt-1">+5.2% desde o mês passado</p>
                </div>
                <i class="fas fa-wallet text-2xl text-indigoDye/80"></i>
            </div>

            <!-- Card 2: Transações -->
            <div class="bg-white p-5 rounded-xl shadow-lg border-b-4 border-prussianBlue flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-PaynesGray uppercase">Transações</p>
                    <p class="text-3xl font-bold text-richBlack mt-1">128</p>
                    <p class="text-xs text-prussianBlue mt-1">+12 este mês</p>
                </div>
                <i class="fas fa-exchange-alt text-2xl text-prussianBlue/80"></i>
            </div>

            <!-- Card 3: Produtos em Estoque -->
            <div class="bg-white p-5 rounded-xl shadow-lg border-b-4 border-hookersGreen flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-PaynesGray uppercase">Produtos em Estoque</p>
                    <p class="text-3xl font-bold text-richBlack mt-1">2.458</p>
                    <p class="text-xs text-red-500 mt-1">-32 desde a semana passada</p>
                </div>
                <i class="fas fa-boxes-stacked text-2xl text-hookersGreen/80"></i>
            </div>
        </div>
<<<<<<< HEAD
        <!-- Card 3 -->
        <div class="bg-white p-5 rounded-xl shadow-lg border-l-4 border-hookersGreen">
            <p class="text-sm font-medium text-PaynesGray uppercase">Estoque Baixo</p>
            <p class="text-3xl font-bold text-richBlack mt-1">12 Itens</p>
=======

        <!-- 2. GRÁFICOS (Desempenho Mensal e Distribuição) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

            <!-- Gráfico 1: Desempenho Mensal (Linha/Área) -->
            <div class="lg:col-span-2 bg-white p-5 rounded-xl shadow-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-prussianBlue">Desempenho Mensal</h3>
                    <button title="Tela Cheia" class="text-PaynesGray hover:text-indigoDye transition duration-150">
                        <i class="fas fa-expand"></i>
                    </button>
                </div>
                <div class="h-64">
                    <canvas id="monthlyPerformanceChart"></canvas>
                </div>
            </div>

            <!-- Gráfico 2: Distribuição (Pizza/Rosca) -->
            <div class="lg:col-span-1 bg-white p-5 rounded-xl shadow-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-prussianBlue">Distribuição</h3>
                    <button title="Tela Cheia" class="text-PaynesGray hover:text-indigoDye transition duration-150">
                        <i class="fas fa-expand"></i>
                    </button>
                </div>
                <div class="h-64 flex justify-center items-center">
                    <canvas id="distributionChart"></canvas>
                </div>
            </div>
        </div>

        <!-- 3. TRANSAÇÕES RECENTES -->
        <div class="bg-white rounded-xl shadow-lg p-6">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-prussianBlue">Transações Recentes</h3>
                <!-- Botão de Adição ("+") -->
                <a href="{{ route('registerTransaction') }}"
                    class="flex items-center justify-center h-10 w-10 rounded-full bg-hookersGreen text-white shadow-md hover:bg-prussianBlue transition duration-150"
                    title="Nova Transação">
                    <i class="fas fa-plus text-lg"></i>
                </a>
            </div>


            <!-- Tabela Responsiva (Usando overflow-x-auto para mobile) -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Descrição
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Tipo de transação
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Valor
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Data de Entrada
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Categoria
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Forma de Pagamento
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($transactionsMade as $transactionMade)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-[16px] font-medium text-prussianBlue">
                                    {{ $transactionMade->description_sale }}
                                </td>

                                @if ($transactionMade->TypeTransaction_id == 1)
                                    <td>
                                        <span class="px-6 py-4 whitespace-nowrap text-[16px] font-medium text-prussianBlue">
                                            {{ $transactionMade->TypeTransaction->transaction }}
                                        </span>
                                    </td>
                                @else
                                    <td>
                                        <span class="px-6 py-4 whitespace-nowrap text-[16px] font-medium text-prussianBlue">
                                            {{ $transactionMade->TypeTransaction->transaction }}
                                        </span>
                                    </td>
                                @endif

                                <td class="px-6 py-4 whitespace-nowrap text-success font-semibold">
                                    @if ($transactionMade->TypeTransaction_id == 1)
                                        <span class="text-green-500">
                                            + {{ $transactionMade->value_transaction }}
                                        </span>
                                    @else
                                        <span class="text-red-500">
                                            - {{ $transactionMade->value_transaction }}
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-[16px] text-PaynesGray">
                                    {{ $transactionMade->entry_date }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-[16px] text-PaynesGray">
                                    {{ $transactionMade->Category->category }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-[16px] text-PaynesGray">
                                    {{ $transactionMade->TypePayment->payment }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($transactionMade->status_transaction == 'Pago')
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-500 border border-green-500">
                                            {{ $transactionMade->status_transaction }}
                                        </span>
                                    @endif

                                    @if ($transactionMade->status_transaction == 'Pendente')
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-yellow-100 text-yellow-500 border border-yellow-500">
                                            {{ $transactionMade->status_transaction }}
                                        </span>
                                    @endif

                                    @if ($transactionMade->status_transaction == 'Cancelado')
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-red-100 text-red-500 border border-red-500">
                                            {{ $transactionMade->status_transaction }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
>>>>>>> 2245c7d0d20ef4e42ebd06a5af3f436b06eef751
        </div>
    </main>
@endsection

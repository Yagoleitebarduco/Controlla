@extends('layouts.app')
@section('title-page')
    - Registro de Transação
@endsection
@section('title')
    Registro de Transação
@endsection

@section('content')
    <!-- Área de Conteúdo Principal -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

        <!-- Card Principal: Nova Transação -->
        <div class="bg-white rounded-xl shadow-lg p-6 lg:p-8 mx-auto">

            <!-- Header do Card e Steps (Processos) -->
            <div class="flex justify-between items-center mb-6 border-b pb-4">
                <h2 class="text-2xl font-bold text-prussianBlue">Nova Transação</h2>

                <!-- Steps de Processo (Passos 1/3, 2/3, 3/3) -->
                <div class="hidden sm:flex items-center space-x-6 text-sm">
                    <!-- Step 1: Informações (Ativo) -->
                    <div class="flex items-center space-x-2">
                        <span
                            class="flex items-center justify-center h-8 w-8 rounded-full bg-hookersGreen text-white font-bold">1</span>
                        <span class="text-hookersGreen font-semibold whitespace-nowrap">Informações</span>
                    </div>

                    <!-- Separador -->
                    <span class="h-px w-8 bg-gray-300"></span>

                    <!-- Step 2: Itens da Transação (Inativo) -->
                    <div class="flex items-center space-x-2">
                        <span
                            class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 text-PaynesGray font-semibold">2</span>
                        <span class="text-PaynesGray whitespace-nowrap">Itens da Transação</span>
                    </div>

                    <!-- Separador -->
                    <span class="h-px w-8 bg-gray-300"></span>

                    <!-- Step 3: Confirmação (Inativo) -->
                    <div class="flex items-center space-x-2">
                        <span
                            class="flex items-center justify-center h-8 w-8 rounded-full bg-gray-200 text-PaynesGray font-semibold">3</span>
                        <span class="text-PaynesGray whitespace-nowrap">Confirmação</span>
                    </div>
                </div>
            </div>

            <!-- Corpo do Formulário (Onde o Step 1 será exibido inicialmente) -->
            <form class="space-y-6">
                <!-- NOVO: Seletor de Tipo de Transação (Receita ou Despesa) - Full Width -->
                <div class="flex space-x-4 mb-8 text-center">

                    <!-- Receita Card/Button (Selected State - Fundo Semi-transparente Verde) -->
                    <button type="button"
                        class="flex-1 p-6 rounded-xl shadow-xl border-2 border-hookersGreen transition duration-300 
                        bg-hookersGreenLight text-hookersGreen cursor-pointer">
                        <i class="fas fa-arrow-up text-3xl mb-2" style="color: #4B7368"></i>
                        <p class="text-xl font-bold">Receita</p>
                    </button>

                    <!-- Despesa Card/Button (Unselected State with Red Hover) -->
                    <button type="button"
                        class="flex-1 p-6 rounded-xl shadow-md border-2 border-gray-200 transition duration-300 
                        bg-white text-PaynesGray hover:border-dangerRed hover:shadow-xl hover:text-red hover:text-dangerRed hover:bg-dangerRedLight">
                        <i class="fas fa-arrow-down text-3xl mb-2" style="color: #dc2626"></i>
                        <p class="text-xl font-bold">Despesa</p>
                    </button>
                </div>

                <!-- Coluna 1: Descrição e Valor -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Descrição da Venda -->
                    <div>
                        <label for="descricao" class="block text-sm font-medium text-prussianBlue mb-1">
                            Descrição da Venda/Transação
                        </label>
                        <input id="descricao" name="descricao" type="text" placeholder="Ex: Venda de Produtos Julho"
                            required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>

                    <!-- Valor -->
                    <div>
                        <label for="valor" class="block text-sm font-medium text-prussianBlue mb-1">
                            Valor (R$)
                        </label>
                        <input id="valor" name="valor" type="number" inputmode="decimal" placeholder="0,00" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>
                </div>

                <!-- Coluna 2: Data, Categoria e Forma de Pagamento -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- Data de Entrada -->
                    <div>
                        <label for="data_entrada" class="block text-sm font-medium text-prussianBlue mb-1">
                            Data de Entrada
                        </label>
                        <input id="data_entrada" name="data_entrada" type="date" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>

                    <!-- Categoria -->
                    <div>
                        <label for="categoria" class="block text-sm font-medium text-prussianBlue mb-1">
                            Categoria
                        </label>
                        <select id="categoria" name="categoria" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base bg-white">
                            <option value="">Selecione a Categoria</option>
                            <option value="venda_servico">Venda de Serviço</option>
                            <option value="venda_produto">Venda de Produto</option>
                            <option value="investimento">Investimento</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>

                    <!-- Forma de Pagamento -->
                    <div>
                        <label for="forma_pagamento" class="block text-sm font-medium text-prussianBlue mb-1">
                            Forma de Pagamento
                        </label>
                        <select id="forma_pagamento" name="forma_pagamento" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base bg-white">
                            <option value="">Selecione a Forma</option>
                            <option value="pix">PIX</option>
                            <option value="cartao">Cartão de Crédito/Débito</option>
                            <option value="dinheiro">Dinheiro</option>
                            <option value="boleto">Boleto</option>
                        </select>
                    </div>
                </div>

                <!-- Coluna 3: Status (Full Width) -->
                <div>
                    <label for="status" class="block text-sm font-medium text-prussianBlue mb-1">
                        Status da Transação
                    </label>
                    <select id="status" name="status" required
                        class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base bg-white">
                        <option value="">Selecione o Status</option>
                        <option value="pago">Pago/Concluído</option>
                        <option value="pendente">Pendente</option>
                        <option value="cancelado">Cancelado</option>
                    </select>
                </div>

                <!-- Botão de Navegação -->
                <div class="pt-4 flex justify-end">
                    <button type="submit"
                        class="flex items-center py-3 px-6 border border-transparent rounded-lg shadow-lg 
                                           text-lg font-semibold text-white bg-indigoDye hover:bg-prussianBlue 
                                           transition duration-300 ease-in-out transform hover:scale-[1.01] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigoDye">
                        Próximo Passo
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection

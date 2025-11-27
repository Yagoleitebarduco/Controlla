@extends('layouts.app')
@section('title-page')
    - Registro de Transação
@endsection
@section('title')
    Registro de Transação
@endsection

@section('content')
    <!-- Área de Conteúdo Principal -->
    {{-- <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

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
            <form class="space-y-6" action="{{ route('registerTransaction') }}" method="POST">
                @csrf
                <!-- NOVO: Seletor de Tipo de Transação (Receita ou Despesa) - Full Width -->
                <div class="flex space-x-4 mb-8 text-center">
                    <!-- Receita Card/Button (Selected State - Fundo Semi-transparente Verde) -->
                    <button type="button" id="receitaStyle" onclick="selectTransaction('receita', 1)"
                        class="flex-1 p-6 rounded-xl shadow-md border-2 transition duration-300 cursor-pointer
                            hover:border-hookersGreen hover:bg-hookersGreenLight hover:text-hookersGreen border-gray-200
                        ">

                        <i class="fas fa-arrow-up text-3xl mb-2" style="color: #4B7368"></i>
                        <p class="text-xl font-bold">Receita</p>
                    </button>

                    <!-- Despesa Card/Button (Unselected State with Red Hover) -->
                    <button type="button" id="despesaStyle" onclick="selectTransaction('despesa', 2)"
                        class="flex-1 p-6 rounded-xl shadow-md border-2 transition duration-300 cursor-pointer 
                            hover:border-dangerRed hover:bg-dangerRedLight hover:text-dangerRed border-gray-200    
                        ">
                        <i class="fas fa-arrow-down text-3xl mb-2" style="color: #dc2626"></i>
                        <p class="text-xl font-bold">Despesa</p>
                    </button>

                    <input type="hidden" name="TypeTransaction_id" id="TypeTransaction_id" value="" required>
                </div>

                <!-- Coluna 1: Descrição e Valor -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Descrição da Venda -->
                    <div>
                        <label for="description_sale" class="block text-sm font-medium text-prussianBlue mb-1">
                            Descrição da Venda/Transação
                        </label>
                        <input id="description_sale" name="description_sale" type="text"
                            placeholder="Ex: Venda de Produtos Julho" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>

                    <!-- Valor -->
                    <div>
                        <label for="value_transaction" class="block text-sm font-medium text-prussianBlue mb-1">
                            Valor (R$)
                        </label>
                        <input id="value_transaction" name="value_transaction" type="number" inputmode="decimal"
                            placeholder="0,00" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>
                </div>

                <!-- Coluna 2: Data, Categoria e Forma de Pagamento -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- Data de Entrada -->
                    <div>
                        <label for="entry_date" class="block text-sm font-medium text-prussianBlue mb-1">
                            Data de Entrada
                        </label>
                        <input id="entry_date" name="entry_date" type="date" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>

                    <!-- Categoria -->
                    <div>
                        <label for="Category_id" class="block text-sm font-medium text-prussianBlue mb-1">
                            Categoria
                        </label>
                        <select id="Category_id" name="Category_id" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base bg-white">
                            <option selected class="hidden">Selecione a Categoria</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Forma de Pagamento -->
                    <div>
                        <label for="TypePayment_id" class="block text-sm font-medium text-prussianBlue mb-1">
                            Forma de Pagamento
                        </label>
                        <select id="TypePayment_id" name="TypePayment_id" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base bg-white">
                            <option selected class="hidden">Selecione a Forma de Pagamento</option>
                            @foreach ($payments as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->payment }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Coluna 3: Status (Full Width) -->
                <div>
                    <label for="status_transaction" class="block text-sm font-medium text-prussianBlue mb-1">
                        Status da Transação
                    </label>
                    <select id="status_transaction" name="status_transaction" required
                        class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base bg-white">
                        <option selected class="hidden">Selecione a Status de Transação</option>
                        <option value="Pago">Pago</option>
                        <option value="Pendente">Pendente</option>
                        <option value="Cancelado">Cancelado</option>
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

                <script>
                    const class_active_receita = 'border-hookersGreen bg-hookersGreenLight text-hookersGreen ';
                    const class_active_despesa = 'border-dangerRed bg-dangerRedLight text-dangerRed';
                    const class_inactive = 'border-gray-200 text-PaynesGray';

                    function selectTransaction(typeSelect, typeId) {
                        const transactionInput = document.getElementById('TypeTransaction_id');
                        const btnReceita = document.getElementById('receitaStyle');
                        const btnDespesa = document.getElementById('despesaStyle');

                        if (typeSelect === 'receita') {
                            transactionInput.value = typeId;
                            btnReceita.className =
                                `flex-1 p-6 rounded-xl shadow-md border-2 transition duration-300 cursor-pointer ${class_active_receita}`;
                            btnDespesa.className =
                                `flex-1 p-6 rounded-xl shadow-md border-2 transition duration-300 cursor-pointer ${class_inactive}`;
                        } else if (typeSelect === 'despesa') {
                            transactionInput.value = typeId;
                            btnDespesa.className =
                                `flex-1 p-6 rounded-xl shadow-md border-2 transition duration-300 cursor-pointer ${class_active_despesa}`;
                            btnReceita.className =
                                `flex-1 p-6 rounded-xl shadow-md border-2 transition duration-300 cursor-pointer ${class_inactive}`;
                        }
                    }
                </script>
            </form>
        </div>

        <!-- NOVO: TABELA DE TRANSAÇÕES RECENTES -->
        <div class="bg-white rounded-xl shadow-lg p-6 mt-6">

            <h3 class="text-xl font-semibold text-prussianBlue mb-4">Transações Recentes</h3>

            <!-- Tabela Responsiva (Usando overflow-x-auto para mobile) -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded-xl">
                    <thead class="bg-gray-200 text-black">
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
                                Data
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
                        <!-- Transação 1 (Receita Paga) -->
                        @foreach ($transactionsMade as $transactionMade)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-[16px] font-medium text-prussianBlue">
                                    {{ $transactionMade->description_sale }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-[16px] font-medium text-prussianBlue">
                                    {{ $transactionMade->TypeTransaction->transaction }}
                                </td>

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
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full uppercase bg-green-300">
                                            {{ $transactionMade->status_transaction }}
                                        </span>
                                    @endif

                                    @if ($transactionMade->status_transaction == 'Pendente')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full uppercase bg-amber-300">
                                            {{ $transactionMade->status_transaction }}
                                        </span>
                                    @endif

                                    @if ($transactionMade->status_transaction == 'Cancelado')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full uppercase bg-red-300">
                                            {{ $transactionMade->status_transaction }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Botão "Ver Mais" -->
            <div class="mt-6">
                <a href="#"
                    class="py-2 px-4 border border-indigoDye rounded-lg shadow-sm 
                                   text-sm font-semibold text-indigoDye bg-white hover:bg-indigoDye hover:text-white 
                                   transition duration-300 ease-in-out">
                    Ver Mais Transações
                </a>
            </div>
        </div>
    </main> --}}

    <!-- Área de Conteúdo Principal -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto p-2">
        <!-- Card Principal: Nova Transação (Máx. 4xl, centralizado) -->
        <div class="bg-white rounded-xl shadow-lg p-6 lg:p-8 mx-auto mb-6">

            <!-- Header do Card e Steps (Processos) -->
            <div class="flex justify-between items-center mb-6 border-b pb-4">
                <h2 class="text-2xl font-bold text-prussianBlue">Nova Transação Financeira</h2>

                <!-- Steps de Processo (Atualizado conforme a imagem) -->
                <div class="hidden sm:flex items-center space-x-2 text-sm">

                    <!-- Step 1: Informações Básicas (Ativo) -->
                    <div class="flex items-center space-x-2">
                        <span class="flex items-center justify-center h-8 w-8 text-white font-bold step-active">1</span>
                        <span class="text-prussianBlue font-semibold whitespace-nowrap">Informações Básicas</span>
                    </div>

                    <!-- Separador -->
                    <span class="h-px w-8 bg-gray-300"></span>

                    <!-- Step 2: Itens da Transação (Inativo) -->
                    <div class="flex items-center space-x-2">
                        <span class="flex items-center justify-center h-8 w-8 font-semibold step-inactive">2</span>
                        <span class="text-PaynesGray whitespace-nowrap">Itens da Transação</span>
                    </div>

                    <!-- Separador -->
                    <span class="h-px w-8 bg-gray-300"></span>

                    <!-- Step 3: Confirmação (Inativo) -->
                    <div class="flex items-center space-x-2">
                        <span class="flex items-center justify-center h-8 w-8 font-semibold step-inactive">3</span>
                        <span class="text-PaynesGray whitespace-nowrap">Confirmação</span>
                    </div>
                </div>
            </div>

            <!-- Seletor de Tipo de Transação (Receita ou Despesa) - Full Width -->
            <div class="flex space-x-4 mb-8 text-center">

                <!-- Receita Card/Button (Selected State) -->
                <button type="button"
                    class="flex-1 p-6 rounded-xl shadow-xl border-2 border-hookersGreen transition duration-300
                        bg-hookersGreenLight text-hookersGreen cursor-default">
                    <i class="fas fa-arrow-down text-3xl mb-2 rotate-180"></i>
                    <!-- Seta para baixo invertida (para cima) -->
                    <p class="text-xl font-bold">Receita</p>
                    <p class="text-xs text-PaynesGray mt-1">Entrada de recursos</p>
                </button>

                <!-- Despesa Card/Button (Unselected State with Red Hover) -->
                <button type="button"
                    class="flex-1 p-6 rounded-xl shadow-md border-2 border-gray-200 transition duration-300
                        bg-white text-PaynesGray hover:border-dangerRed hover:shadow-xl hover:text-dangerRed hover:bg-dangerRedLight">
                    <i class="fas fa-arrow-up text-3xl mb-2 rotate-180"></i> <!-- Seta para cima (para baixo) -->
                    <p class="text-xl font-bold">Despesa</p>
                    <p class="text-xs text-PaynesGray mt-1">Saída de recursos</p>
                </button>


            </div>

            <!-- Corpo do Formulário: Step 1 (Informações Básicas) -->
            <form class="space-y-6" action="{{ route('registerTransaction') }}" method="POST">
                <input type="hidden" name="TypeTransaction_id" id="TypeTransaction_id" value="" required>

                <!-- Linha 1: Descrição e Valor -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Descrição da Venda -->
                    <div>
                        <label for="description_sale" class="block text-sm font-medium text-prussianBlue mb-1">
                            Descrição de Venda
                        </label>
                        <input id="description_sale" name="description_sale" type="text" placeholder="Ex: Venda de Soja"
                            required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>

                    <!-- Valor -->
                    <div>
                        <label for="value_transaction" class="block text-sm font-medium text-prussianBlue mb-1">
                            Valor (R$) *
                        </label>
                        <input id="value_transaction" name="value_transaction" type="text" inputmode="decimal"
                            placeholder="0.00" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>
                </div>

                <!-- Linha 2: Data e Categoria -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Data de Entrada -->
                    <div>
                        <label for="entry_date" class="block text-sm font-medium text-prussianBlue mb-1">
                            Data *
                        </label>
                        <input id="entry_date" name="entry_date" type="date" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>

                    <!-- Categoria -->
                    <div>
                        <label for="Category_id" class="block text-sm font-medium text-prussianBlue mb-1">
                            Categoria *
                        </label>
                        <select id="Category_id" name="Category_id" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base bg-white">
                            <option selected class="hidden">Selecione a Categoria</option>
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Linha 3: Forma de Pagamento e Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Forma de Pagamento -->
                    <div>
                        <label for="TypePayment_id" class="block text-sm font-medium text-prussianBlue mb-1">
                            Forma de Pagamento
                        </label>
                        <select id="TypePayment_id" name="TypePayment_id" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base bg-white">
                            <option class="hidden" selected>Selecione a Forma de Pagamento</option>
                            @foreach ($payments as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->payment }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status_transaction" class="block text-sm font-medium text-prussianBlue mb-1">
                            Status
                        </label>
                        <select id="status_transaction" name="status_transaction" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base bg-white">
                            <option value="Pago">Pago</option>
                            <option value="Pendente">Pendente</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                </div>

                <!-- Anexos (Adicionado conforme a imagem de referência) -->
                <div>
                    <label for="anexos" class="block text-sm font-medium text-prussianBlue mb-1">
                        Anexos
                    </label>

                    <div class="mt-1 flex items-center space-x-2">
                        <label for="file_upload"
                            class="cursor-pointer bg-gray-100 hover:bg-gray-200 py-2 px-4 rounded-lg border border-gray-300 text-sm font-medium text-prussianBlue shadow-sm transition duration-150">
                            Escolher Arquivos
                        </label>
                        <input id="file_upload" name="file_upload" type="file" multiple class="hidden">
                        <span class="text-sm text-PaynesGray">Nenhum arquivo escolhido</span>
                    </div>
                    <p class="mt-1 text-xs text-PaynesGray">Formatos suportados: PDF, JPG, PNG (máx. 5MB cada)</p>
                </div>

                <!-- Botões de Ação -->
                <div class="pt-6 flex justify-between space-x-4">

                    <!-- Botão Voltar/Cancelar -->
                    <button type="button"
                        class="flex items-center py-3 px-6 border border-gray-300 rounded-lg shadow-md
                                           text-lg font-semibold text-PaynesGray bg-white hover:bg-gray-100
                                           transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-PaynesGray">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Voltar
                    </button>

                    <!-- Botão Próximo Passo / Salvar Transação -->
                    <button type="submit"
                        class="flex items-center py-3 px-6 border border-transparent rounded-lg shadow-lg
                                           text-lg font-semibold text-white bg-indigoDye hover:bg-prussianBlue
                                           transition duration-300 ease-in-out transform hover:scale-[1.01] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigoDye">
                        Salvar Transação
                    </button>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#value_transaction').mask('000.000.000.000.000,00', {
                            reverse: true,
                            placeholder: "0,00"
                        })
                    })
                </script>
            </form>
        </div>

        <!-- TRANSAÇÕES RECENTES (NOVA SEÇÃO, conforme a imagem de lista) -->
        <div class="bg-white rounded-xl shadow-lg p-6 mx-auto mt-6">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-prussianBlue">Transações Recentes</h3>
                <!-- Botão Ver Todas -->
                <a href="#"
                    class="py-2 px-4 border border-gray-300 rounded-lg shadow-sm
                            text-sm font-semibold text-PaynesGray bg-gray-50 hover:bg-gray-100
                            transition duration-300 ease-in-out whitespace-nowrap">
                    Ver Todas
                </a>
            </div>

            <!-- Lista de Transações (Substituindo a tabela) -->
            <div class="space-y-3 divide-y divide-gray-100">

                <!-- Transação 1: Crédito (Venda de Soja) -->
                <div class="flex justify-between items-center py-3">
                    <div class="flex items-start space-x-4">
                        <div
                            class="flex items-center justify-center h-10 w-10 rounded-full bg-success/20 text-success shrink-0 mt-1">
                            <i class="fas fa-arrow-down rotate-180"></i>
                        </div>
                        <div>
                            <p class="text-base font-semibold text-richBlack">Venda de Soja - Safra 2023</p>
                            <p class="text-xs text-PaynesGray mt-0.5">15/08/2023 • Cliente: Cooperativa Agro</p>
                        </div>
                    </div>
                    <p class="text-base font-bold text-success whitespace-nowrap">+ R$ 12.450,00</p>
                </div>

                <!-- Transação 2: Débito (Compra de Fertilizantes) -->
                <div class="flex justify-between items-center py-3">
                    <div class="flex items-start space-x-4">
                        <div
                            class="flex items-center justify-center h-10 w-10 rounded-full bg-danger/20 text-danger shrink-0 mt-1">
                            <i class="fas fa-arrow-up rotate-180"></i>
                        </div>
                        <div>
                            <p class="text-base font-semibold text-richBlack">Compra de Fertilizantes</p>
                            <p class="text-xs text-PaynesGray mt-0.5">14/08/2023 • Fornecedor: AgroQuímica</p>
                        </div>
                    </div>
                    <p class="text-base font-bold text-danger whitespace-nowrap">- R$ 8.320,00</p>
                </div>

                <!-- Transação 3: Débito (Manutenção de Trator) -->
                <div class="flex justify-between items-center py-3">
                    <div class="flex items-start space-x-4">
                        <div
                            class="flex items-center justify-center h-10 w-10 rounded-full bg-danger/20 text-danger shrink-0 mt-1">
                            <i class="fas fa-arrow-up rotate-180"></i>
                        </div>
                        <div>
                            <p class="text-base font-semibold text-richBlack">Manutenção de Trator</p>
                            <p class="text-xs text-PaynesGray mt-0.5">12/08/2023 • Mecânica Agrícola</p>
                        </div>
                    </div>
                    <p class="text-base font-bold text-danger whitespace-nowrap">- R$ 3.150,00</p>
                </div>
            </div>
        </div>
    </main>
@endsection

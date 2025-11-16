@extends('layouts.app')
@section('title-page')
    - Estoque
@endsection
@section('title')
    Controle de Estoque
@endsection

@section('content')
    <!-- Área de Conteúdo Principal -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

        <!-- Título Secundário -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-prussianBlue">Adicionar Novo Item ao Estoque</h2>
            <p class="text-PaynesGray">Preencha os dados do novo produto ou serviço.</p>
        </div>

        <!-- Card Principal do Formulário -->
        <div class="bg-white rounded-xl shadow-lg p-6 lg:p-8 mx-auto">

            <form class="space-y-6" action="{{ route('update.stock', $product) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Seção 1: Informações Básicas (Duas Colunas) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-b pb-6">

                    <!-- Código do Produto (COD) -->
                    <div>
                        <label for="cod" class="block text-sm font-medium text-prussianBlue mb-1">
                            Código do Produto
                        </label>
                        <input id="cod" name="cod" type="text" placeholder="Ex: P-101" required value="{{ $product->cod }}"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>

                    <!-- Nome do Produto -->
                    <div>
                        <label for="name_product" class="block text-sm font-medium text-prussianBlue mb-1">
                            Nome do Produto
                        </label>
                        <input id="name_product" name="name_product" type="text" placeholder="Ex: Kit Bateria de Lítio"
                            required value="{{ $product->name_product }}"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>

                    <!-- Categoria (Full Width em Mobile, Coluna em Desktop) -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-prussianBlue mb-1">
                            Categoria
                        </label>
                        <select id="category" name="Category_id" required
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base bg-white">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->Category_id == $category->id ? 'selected' : '' }}>
                                    
                                    {{ $category->category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="unit_measure" class="block text-sm font-medium text-prussianBlue mb-1">
                            Qual a Unidade de Medida (EX: Kg, L, G)
                        </label>
                        <input id="unit_measure" name="unit_measure" type="text" required value="{{ $product->unit_measure }}"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>
                </div>

                <!-- Seção 2: Valores e Estoque (Três Colunas) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">

                    <!-- Valor Unitário -->
                    <div>
                        <label for="unit_value" class="block text-sm font-medium text-prussianBlue mb-1">
                            Valor Unitário (R$)
                        </label>
                        <input id="unit_value" name="unit_value" type="text" inputmode="decimal" placeholder="0,00"
                            required value="{{ $product->unit_value }}"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>

                    <!-- Estoque Mínimo -->
                    <div>
                        <label for="min_stock" class="block text-sm font-medium text-prussianBlue mb-1">
                            Estoque Mínimo
                        </label>
                        <input id="min_stock" name="min_stock" type="number" inputmode="numeric" placeholder="Ex: 10"
                            required value="{{ $product->min_stock }}"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>

                    <!-- Estoque Atual (Campo de informação inicial) -->
                    <div>
                        <label for="max_stock" class="block text-sm font-medium text-prussianBlue mb-1">
                            Estoque Total
                        </label>
                        <input id="max_stock" name="max_stock" type="number" inputmode="numeric" placeholder="Ex: 50"
                            value="{{ $product->max_stock }}"
                            class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                    </div>
                </div>
                
                <!-- Botões de Ação -->
                <div class="pt-6 flex justify-end space-x-4">

                    <!-- Botão Cancelar -->
                    <a href="{{ route('stock') }}"
                        class="flex items-center py-3 px-6 border border-gray-300 rounded-lg shadow-md 
                            text-lg font-semibold text-PaynesGray bg-white hover:bg-gray-100 
                            transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-PaynesGray">
                        Cancelar
                    </a>

                    <!-- Botão Salvar -->
                    <button type="submit"
                        class="flex items-center py-3 px-6 border border-transparent rounded-lg shadow-lg 
                            text-lg font-semibold text-white bg-hookersGreen hover:bg-prussianBlue 
                            transition duration-300 ease-in-out transform hover:scale-[1.01] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-hookersGreen">
                        <i class="fas fa-save mr-2"></i>
                        Salvar Produto
                    </button>
                </div>

                <script>
                    $(document).ready(function() {
                        // Define o padrão para até 15 dígitos na parte inteira + 2 decimais (XX.XXX.XXX.XXX.XXX,XX)
                        $('#unit_value').mask('000.000.000.000.000,00', {
                            // 'reverse: true' é essencial para moeda, pois aplica a máscara da direita para a esquerda.
                            reverse: true,
                            placeholder: "0,00"
                        });
                    });
                </script>
            </form>
        </div>
    </main>
@endsection

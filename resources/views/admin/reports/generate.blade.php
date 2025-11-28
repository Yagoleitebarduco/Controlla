@extends('layouts.app')

@section('title-page')
    - Gerar Relatório
@endsection

@section('title')
    Gerar Relatório
@endsection

@section('button-header')
    <!-- Botão Voltar (para desktop) -->
    <a href="{{ route('reports.index') }}"
        class="hidden sm:flex items-center py-2 px-4 border border-transparent rounded-lg shadow-md 
                        text-sm font-semibold text-white bg-indigoDye hover:bg-prussianBlue 
                        transition duration-150 ease-in-out whitespace-nowrap">
        <i class="fas fa-arrow-left mr-2"></i>
        Voltar para Relatórios
    </a>
@endsection

@section('content')
    <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-prussianBlue">Gerar Novo Relatório</h2>
                <p class="text-PaynesGray">Selecione o tipo de relatório que deseja gerar.</p>
            </div>

            <!-- Botão Voltar (para mobile) -->
            <a href="{{ route('reports.index') }}"
                class="sm:hidden flex items-center py-2 px-3 border border-transparent rounded-lg shadow-md 
                        text-sm font-semibold text-white bg-indigoDye hover:bg-prussianBlue 
                        transition duration-150 ease-in-out whitespace-nowrap">
                <i class="fas fa-arrow-left mr-1"></i> Voltar
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <form action="{{ route('reports.download') }}" method="POST" id="generateForm">
                @csrf
                <div class="mb-6">
                    <label for="report_type" class="block text-sm font-medium text-PaynesGray mb-2">
                        Tipo de Relatório
                    </label>
                    <select name="report_type" id="report_type"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigoDye focus:border-transparent">
                        <option class="hidden" selected>Selecione um tipo...</option>
                        <option value="stock_inventory">Relatorio de Estoque</option>
                        <option value="financial_statement">Relatorio Financeiro</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="py-2 px-4 border border-transparent rounded-lg shadow-md 
                        text-sm font-semibold text-white bg-indigoDye hover:bg-prussianBlue 
                        transition duration-150 ease-in-out whitespace-nowrap">
                        <i class="fas fa-download mr-2"></i>
                        Gerar e Baixar PDF
                    </button>
                </div>
            </form>
        </div>

    </main>
@endsection

@push('scripts')
<script>
    // Adiciona um pequeno script para validar o formulário antes de enviar
    document.getElementById('generateForm').addEventListener('submit', function(e) {
        const select = document.getElementById('report_type');
        if (!select.value) {
            e.preventDefault();
            alert('Por favor, selecione um tipo de relatório.');
        }
    });
</script>
@endpush
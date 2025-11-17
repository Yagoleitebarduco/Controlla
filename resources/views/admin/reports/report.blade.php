@extends('layouts.app')
@section('title-page')
    - Relatorios
@endsection

@section('title')
    Relatorios
@endsection
@section('button-header')
    <!-- Botão Gerar Novo Relatório (No Header para acesso rápido em desktop) -->
    <a href="{{ route('reports.generate') }}"
        class="hidden sm:flex items-center py-2 px-4 border border-transparent rounded-lg shadow-md 
                        text-sm font-semibold text-white bg-indigoDye hover:bg-prussianBlue 
                        transition duration-150 ease-in-out whitespace-nowrap">
        <i class="fas fa-plus mr-2"></i>
        Gerar Novo Relatório
    </a>
@endsection

@section('content')
    <!-- Área de Conteúdo Principal -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-prussianBlue">Relatórios Gerados</h2>
                <p class="text-PaynesGray">Acesse e gerencie seus documentos de análise.</p>
            </div>

            <!-- Botão Gerar Novo Relatório (Para Mobile - oculto em sm+) -->
            <a href="{{ route('reports.generate') }}"
                class="sm:hidden flex items-center py-2 px-3 border border-transparent rounded-lg shadow-md 
                        text-sm font-semibold text-white bg-indigoDye hover:bg-prussianBlue 
                        transition duration-150 ease-in-out whitespace-nowrap">
                <i class="fas fa-plus mr-1"></i> Novo
            </a>
        </div>

        <!-- Card Principal: Tabela de Relatórios -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-xl font-semibold text-prussianBlue mb-4 border-b pb-3">Histórico de Documentos</h3>

            <!-- Tabela Responsiva -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Nome
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Tipo
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Período
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Data Geração
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-PaynesGray uppercase tracking-wider">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($reports as $report)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-prussianBlue">
                                    {{ $report->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-PaynesGray">
                                    {{ ucfirst(str_replace('_', ' ', $report->type)) }} {{-- Formata o tipo --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-PaynesGray">
                                    <!-- Exemplo de período, você pode melhorar isso no futuro -->
                                    Data: {{ $report->generated_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-richBlack">
                                    {{ $report->generated_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-success/10 text-success">
                                        Concluído
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-3">
                                    <button class="text-indigoDye hover:text-prussianBlue transition duration-150"
                                        title="Visualizar">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <!-- Link funcional para download baseado no tipo salvo no banco -->
                                    <a href="{{ route('reports.download', ['report_type' => $report->type]) }}"
                                        class="text-hookersGreen hover:text-prussianBlue transition duration-150"
                                        title="Download PDF">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-sm text-PaynesGray">
                                    Nenhum relatório gerado ainda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <!-- Se você tiver outros scripts, coloque-os aqui -->
    <!-- Script para download funcional (opcional, se quiser manter o JS anterior) -->
    <script>
        // Seu script anterior pode ser mantido aqui se necessário
        // Porém, agora os links são diretamente funcionais via Blade
    </script>
@endpush
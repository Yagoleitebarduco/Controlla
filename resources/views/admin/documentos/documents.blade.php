@extends('layouts.app')

@section('title-page')
    - Documentos
@endsection

@section('title')
    Gerenciamento de Arquivos
@endsection

@section('button-header')
    <!-- Botão Novo Documento (Visível em SM+ ) -->
    <label for="file-upload-input" class="hidden sm:flex items-center py-2 px-4 border border-transparent rounded-lg shadow-md
                        text-sm font-semibold text-white bg-hookersGreen hover:bg-prussianBlue
                        transition duration-150 ease-in-out whitespace-nowrap cursor-pointer">
        <i class="fas fa-file-circle-plus mr-2"></i>
        Novo Documento
    </label>
@endsection

<!-- Área de Conteúdo Principal -->
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-prussianBlue">Gerenciamento de Arquivos</h2>
            <p class="text-PaynesGray">Visualize e organize todos os documentos da sua empresa.</p>
        </div>

        <!-- Botão Novo Documento (Para Mobile - oculto em sm+) -->
        <label for="file-upload-input" class="sm:hidden flex items-center py-2 px-3 border border-transparent rounded-lg shadow-md
                        text-sm font-semibold text-white bg-hookersGreen hover:bg-prussianBlue
                        transition duration-150 ease-in-out whitespace-nowrap cursor-pointer">
            <i class="fas fa-file-circle-plus mr-1"></i> Novo
        </label>
    </div>

    <!-- NOVO: CARDS DE MÉTRICAS DE DOCUMENTOS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

        <!-- Card 1: Total de Documentos -->
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-indigoDye flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-PaynesGray uppercase">Total de Documentos</p>
                <p class="text-3xl font-bold text-richBlack mt-1">{{ count($documents) }}</p>
            </div>
            <i class="fas fa-file-invoice text-4xl text-indigoDye/60"></i>
        </div>

        <!-- Card 2: Armazenamento Utilizado -->
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-hookersGreen flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-PaynesGray uppercase">Armazenamento Utilizado</p>
                <p class="text-3xl font-bold text-richBlack mt-1">{{ $totalSizeFormatted }}</p>
            </div>
            <i class="fas fa-database text-4xl text-hookersGreen/60"></i>
        </div>

        <!-- Card 3: Documentos Recentemente Adicionados -->
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-warning flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-PaynesGray uppercase">Novos Este Mês</p>
                <p class="text-3xl font-bold text-richBlack mt-1">{{ $newThisMonth }}</p>
            </div>
            <i class="fas fa-hourglass-half text-4xl text-warning/60"></i>
        </div>
    </div>

    <!-- Seção de Drag and Drop (Arrastar Arquivos) -->
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" id="document-upload-form"
        class="bg-white rounded-xl shadow-lg p-8 mb-6 drag-drop-area flex flex-col items-center justify-center text-center border-2 border-dashed border-gray-300 hover:border-indigoDye transition duration-300">

        @csrf
        <input type="file" multiple name="files[]" id="file-upload-input" class="hidden"
            accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx">

        <i class="fas fa-cloud-arrow-up text-5xl text-PaynesGray mb-4" id="upload-icon"></i>
        <p class="text-lg font-semibold text-richBlack mb-3" id="upload-text">
            Arraste e solte seus arquivos aqui
        </p>

        <p class="text-sm text-PaynesGray mb-4">
            Ou utilize o botão abaixo para selecionar documentos (PDF, Imagens, Planilhas).
        </p>

        <label for="file-upload-input" class="py-2 px-6 cursor-pointer border border-transparent rounded-lg shadow-md
                  text-sm font-semibold text-white bg-indigoDye hover:bg-prussianBlue
                  transition duration-150 ease-in-out">
            <i class="fas fa-upload mr-2"></i> Selecionar Arquivos
        </label>

        @error('files.*')
            <p class="text-sm text-danger mt-3">{{ $message }}</p>
        @enderror

        @if(session('success'))
            <p class="text-sm text-hookersGreen mt-3">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p class="text-sm text-danger mt-3">{{ session('error') }}</p>
        @endif

    </form>

    <!-- Card Principal: LISTA DE DOCUMENTOS EM CARDS -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-xl font-semibold text-prussianBlue mb-4 border-b pb-3">Arquivos Recentes</h3>

        <!-- Grid de Cards (4 por linha em telas grandes) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @forelse($documents as $doc)
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-200">
                <div class="flex justify-between items-start mb-3">
                    <i class="fas {{ $doc->icon }} text-3xl shrink-0"></i>
                    <span class="text-xs text-PaynesGray">{{ $doc->formatted_size }}</span>
                </div>
                <h4 class="text-sm font-semibold text-prussianBlue truncate mb-1" title="{{ $doc->original_name }}">
                    {{ Str::limit(pathinfo($doc->original_name, PATHINFO_FILENAME), 20) }}
                </h4>
                <p class="text-xs text-PaynesGray mb-3">
                    {{ strtoupper($doc->extension) }} | {{ $doc->created_at->format('d/m/Y') }}
                </p>

                <!-- Ações -->
                <div class="flex justify-end space-x-3 border-t pt-3">
                    <a href="{{ $doc->url }}" target="_blank" class="text-indigoDye hover:text-prussianBlue transition duration-150" title="Visualizar">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ $doc->url }}" download="{{ $doc->original_name }}" class="text-hookersGreen hover:text-prussianBlue transition duration-150" title="Download">
                        <i class="fas fa-download"></i>
                    </a>
                    <!-- Botão de Exclusão -->
                    <form action="{{ route('documents.destroy', $doc) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="text-danger hover:text-dangerRed transition duration-150" 
                            title="Excluir"
                            onclick="return confirm('Tem certeza que deseja excluir este documento?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center py-8 text-PaynesGray">
                Nenhum documento foi enviado ainda.
            </div>
            @endforelse

        </div>

    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropArea = document.getElementById('document-upload-form');
    const fileInput = document.getElementById('file-upload-input');
    const uploadIcon = document.getElementById('upload-icon');
    const uploadText = document.getElementById('upload-text');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        dropArea.classList.add('border-indigoDye', 'bg-indigoDye/10');
        uploadIcon.classList.add('text-indigoDye');
    }

    function unhighlight() {
        dropArea.classList.remove('border-indigoDye', 'bg-indigoDye/10');
        uploadIcon.classList.remove('text-indigoDye');
    }

    dropArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        fileInput.files = files;
        dropArea.submit();
    }

    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            uploadText.textContent = `${this.files.length} arquivo(s) selecionado(s).`;
            dropArea.submit();
        }
    });
});
</script>
@endsection
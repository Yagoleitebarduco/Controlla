@extends('layouts.app')

<!-- Área de Conteúdo Principal -->
<main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-prussianBlue">Gerenciamento de Arquivos</h2>
            <p class="text-PaynesGray">Visualize e organize todos os documentos da sua empresa.</p>
        </div>

        <!-- Botão Novo Documento (Para Mobile - oculto em sm+) -->
        <a href="#" class="sm:hidden flex items-center py-2 px-3 border border-transparent rounded-lg shadow-md
                        text-sm font-semibold text-white bg-hookersGreen hover:bg-prussianBlue
                        transition duration-150 ease-in-out whitespace-nowrap">
            <i class="fas fa-file-circle-plus mr-1"></i> Novo
        </a>
    </div>

    <!-- NOVO: CARDS DE MÉTRICAS DE DOCUMENTOS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

        <!-- Card 1: Total de Documentos -->
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-indigoDye flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-PaynesGray uppercase">Total de Documentos</p>
                <p class="text-3xl font-bold text-richBlack mt-1">128</p>
            </div>
            <i class="fas fa-file-invoice text-4xl text-indigoDye/60"></i>
        </div>

        <!-- Card 2: Armazenamento Utilizado -->
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-hookersGreen flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-PaynesGray uppercase">Armazenamento Utilizado</p>
                <p class="text-3xl font-bold text-richBlack mt-1">5.2 GB</p>
            </div>
            <i class="fas fa-database text-4xl text-hookersGreen/60"></i>
        </div>

        <!-- Card 3: Documentos Pendentes -->
        <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-warning flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-PaynesGray uppercase">Documentos Pendentes</p>
                <p class="text-3xl font-bold text-richBlack mt-1">4</p>
            </div>
            <i class="fas fa-hourglass-half text-4xl text-warning/60"></i>
        </div>
    </div>

    <!-- Seção de Drag and Drop (Arrastar Arquivos) -->
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" id="document-upload-form"
        class="bg-white rounded-xl shadow-lg p-8 mb-6 drag-drop-area flex flex-col items-center justify-center text-center border-2 border-dashed border-gray-300 hover:border-indigoDye transition duration-300">

        @csrf <input type="file" multiple name="files[]" id="file-upload-input" class="hidden"
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
    </form>
//


    <!-- Card Principal: LISTA DE DOCUMENTOS EM CARDS -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-xl font-semibold text-prussianBlue mb-4 border-b pb-3">Arquivos Recentes</h3>

        <!-- Grid de Cards (4 por linha em telas grandes) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Card Documento 1 (PDF) -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-200">
                <div class="flex justify-between items-start mb-3">
                    <i class="fas fa-file-pdf text-3xl text-danger shrink-0"></i>
                    <span class="text-xs text-PaynesGray">1.2 MB</span>
                </div>
                <h4 class="text-sm font-semibold text-prussianBlue truncate mb-1" title="Contrato Fornecedor Alpha">
                    Contrato Fornecedor Alpha
                </h4>
                <p class="text-xs text-PaynesGray mb-3">
                    Contrato | 15/07/2024
                </p>

                <!-- Ações -->
                <div class="flex justify-end space-x-3 border-t pt-3">
                    <button class="text-indigoDye hover:text-prussianBlue transition duration-150" title="Visualizar">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="text-hookersGreen hover:text-prussianBlue transition duration-150" title="Download">
                        <i class="fas fa-download"></i>
                    </button>
                    <button class="text-danger hover:text-dangerRed transition duration-150" title="Excluir">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>

            <!-- Card Documento 2 (Imagem - Nota Fiscal) -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-200">
                <div class="flex justify-between items-start mb-3">
                    <i class="fas fa-file-image text-3xl text-warning shrink-0"></i>
                    <span class="text-xs text-PaynesGray">450 KB</span>
                </div>
                <h4 class="text-sm font-semibold text-prussianBlue truncate mb-1" title="Nota Fiscal Compra 0012">
                    Nota Fiscal Compra 0012
                </h4>
                <p class="text-xs text-PaynesGray mb-3">
                    Nota Fiscal | 20/09/2024
                </p>

                <!-- Ações -->
                <div class="flex justify-end space-x-3 border-t pt-3">
                    <button class="text-indigoDye hover:text-prussianBlue transition duration-150" title="Visualizar">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="text-hookersGreen hover:text-prussianBlue transition duration-150" title="Download">
                        <i class="fas fa-download"></i>
                    </button>
                    <button class="text-danger hover:text-dangerRed transition duration-150" title="Excluir">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>

            <!-- Card Documento 3 (Planilha - Financeiro) -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-200">
                <div class="flex justify-between items-start mb-3">
                    <i class="fas fa-file-excel text-3xl text-success shrink-0"></i>
                    <span class="text-xs text-PaynesGray">80 KB</span>
                </div>
                <h4 class="text-sm font-semibold text-prussianBlue truncate mb-1" title="Balanço Mensal Setembro">
                    Balanço Mensal Setembro
                </h4>
                <p class="text-xs text-PaynesGray mb-3">
                    Planilha | 30/09/2024
                </p>

                <!-- Ações -->
                <div class="flex justify-end space-x-3 border-t pt-3">
                    <button class="text-indigoDye hover:text-prussianBlue transition duration-150" title="Visualizar">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="text-hookersGreen hover:text-prussianBlue transition duration-150" title="Download">
                        <i class="fas fa-download"></i>
                    </button>
                    <button class="text-danger hover:text-dangerRed transition duration-150" title="Excluir">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>

            <!-- Card Documento 4 (Contrato) -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-200">
                <div class="flex justify-between items-start mb-3">
                    <i class="fas fa-file-contract text-3xl text-indigoDye shrink-0"></i>
                    <span class="text-xs text-PaynesGray">2.5 MB</span>
                </div>
                <h4 class="text-sm font-semibold text-prussianBlue truncate mb-1" title="Contrato Cliente Beta">
                    Contrato Cliente Beta
                </h4>
                <p class="text-xs text-PaynesGray mb-3">
                    Contrato | 01/10/2024
                </p>

                <!-- Ações -->
                <div class="flex justify-end space-x-3 border-t pt-3">
                    <button class="text-indigoDye hover:text-prussianBlue transition duration-150" title="Visualizar">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="text-hookersGreen hover:text-prussianBlue transition duration-150" title="Download">
                        <i class="fas fa-download"></i>
                    </button>
                    <button class="text-danger hover:text-dangerRed transition duration-150" title="Excluir">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>

            <!-- Card Documento 5 (Outro) -->
            <div
                class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-200">
                <div class="flex justify-between items-start mb-3">
                    <i class="fas fa-file-alt text-3xl text-PaynesGray shrink-0"></i>
                    <span class="text-xs text-PaynesGray">500 KB</span>
                </div>
                <h4 class="text-sm font-semibold text-prussianBlue truncate mb-1" title="Manual de Uso Interno">
                    Manual de Uso Interno
                </h4>
                <p class="text-xs text-PaynesGray mb-3">
                    Manual | 10/10/2024
                </p>

                <!-- Ações -->
                <div class="flex justify-end space-x-3 border-t pt-3">
                    <button class="text-indigoDye hover:text-prussianBlue transition duration-150" title="Visualizar">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="text-hookersGreen hover:text-prussianBlue transition duration-150" title="Download">
                        <i class="fas fa-download"></i>
                    </button>
                    <button class="text-danger hover:text-dangerRed transition duration-150" title="Excluir">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>

        </div>

        <!-- Botão Ver Mais (AGORA ALINHADO À ESQUERDA) -->
        <div class="mt-8 flex justify-start"> <!-- Adicionado 'flex justify-start' -->
            <a href="#" class="py-2 px-6 border border-indigoDye rounded-lg shadow-sm
                                   text-sm font-semibold text-indigoDye bg-white hover:bg-indigoDye hover:text-white
                                   transition duration-300 ease-in-out flex items-center max-w-xs">
                <!-- Removido mx-auto e justify-center -->
                <i class="fas fa-chevron-down mr-2"></i>
                Ver Mais Documentos
            </a>
        </div>
    </div>



    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropArea = document.getElementById('document-upload-form');
        const fileInput = document.getElementById('file-upload-input');
        const uploadIcon = document.getElementById('upload-icon');
        const uploadText = document.getElementById('upload-text');

        // 1. Clique no Input (acionado pelo Label)
        fileInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                // Altera o texto para mostrar que os arquivos foram selecionados
                uploadText.textContent = `${this.files.length} file(s) selected. Click here to upload.`;
                
                // Envia o formulário automaticamente após a seleção
                dropArea.submit(); 
            }
        });

        // 2. Drag and Drop Handling (Impedir o comportamento padrão do navegador)
        
        // Impede o padrão (abrir o arquivo) para todos os eventos de arrastar na área
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Adicionar e remover estilo para feedback visual
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

        // 3. Lidar com o Drop de Arquivos
        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            // Atribui os arquivos soltos ao input file
            fileInput.files = files;

            // Envia o formulário após soltar os arquivos
            dropArea.submit();
        }
    });
</script>
</main>
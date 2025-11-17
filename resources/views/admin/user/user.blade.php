@extends('layouts.app')
@section('title-page')
    - Usuario
@endsection
@section('title')
    {{ Auth::user()->name }} {{ Auth::user()->lastname }}
@endsection

@section('content')
    <!-- 2. CONTEÚDO PRINCIPAL (PERFIL) -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Área de Conteúdo Principal -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-prussianBlue">Configurações de Perfil</h2>
                <p class="text-PaynesGray">Gerencie suas informações pessoais e de acesso.</p>
            </div>

            <!-- Profile Layout: Divide a tela em uma coluna lateral e uma coluna principal -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                <!-- Coluna Esquerda: Foto, Nome e Ações de Perfil (lg:col-span-1) -->
                <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-lg h-fit flex flex-col items-center text-center">

                    <!-- 1. Foto de Perfil (Avatar) e Botão Alterar Foto -->
                    <div class="relative mb-4">
                        <!-- Avatar Circular -->
                        <div
                            class="h-32 w-32 rounded-full bg-gray-200 border-4 border-indigoDye flex items-center justify-center text-5xl text-PaynesGray font-semibold uppercase pointer-events-none">
                            {{ $nameInitial }}{{ $lastnameInitial }}
                        </div>

                        <!-- Botão Alterar Foto (Câmera) -->
                        <a href="#"
                            class="cursor-pointer absolute bottom-0 right-0 p-2 bg-hookersGreen rounded-full text-white shadow-md hover:bg-prussianBlue transition duration-150">
                            <i class="fas fa-camera text-sm"></i>
                        </a>
                    </div>

                    <!-- 2. Nome Completo -->
                    <h3 class="text-xl font-bold text-richBlack mb-6">{{ Auth::user()->name }} {{ Auth::user()->lastname }}
                    </h3>

                    <!-- Links de navegação de perfil (Opcional, para refinar a seção direita) -->
                    <div class="w-full space-y-2 mb-8 border-b pb-4">
                        <a href="#" class="block p-2 rounded-lg text-prussianBlue font-medium bg-gray-100">Informações
                            Pessoais</a>
                        <a href="#" class="block p-2 rounded-lg text-PaynesGray hover:bg-gray-100">Segurança
                            (Senha)</a>
                    </div>

                    <!-- 3. Botão Sair (no final do bloco) -->
                    <form action="{{ route('logout') }}" method="POST"
                        class="w-full flex items-center justify-center py-2 px-4 rounded-lg shadow-md 
                            text-base font-semibold text-red-400 hover:text-red-700 hover:bg-red-200 hover:border-red-700 bg-white
                            border border-red-500 transition duration-400">
                        @csrf
                        <button type="submit" class="cursor-pointer w-full">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Sair
                        </button>
                    </form>
                </div>

                <div class="lg:col-span-3 bg-white p-8 rounded-xl shadow-lg">
                    <h3 class="text-xl font-bold text-prussianBlue mb-6 border-b pb-3">Dados Pessoais</h3>

                    <!-- Formulário de Edição de Dados -->
                    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                        @method('PUT')
                        <!-- Nome -->
                        <div>
                            <label for="profile-first-name"
                                class="block text-sm font-medium text-prussianBlue mb-1">Nome</label>
                            <input id="profile-first-name" type="text" value="{{ Auth::user()->name }}" disabled
                                class="input-field appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm sm:text-base">
                        </div>

                        <!-- Sobrenome -->
                        <div>
                            <label for="profile-last-name"
                                class="block text-sm font-medium text-prussianBlue mb-1">Sobrenome</label>
                            <input id="profile-last-name" type="text" value="{{ Auth::user()->lastname }}" disabled
                                class="input-field appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm sm:text-base">
                        </div>

                        <!-- CPF -->
                        <div>
                            <label for="profile-cpf" class="block text-sm font-medium text-prussianBlue mb-1">CPF</label>
                            <input id="profile-cpf" type="text" value="{{ Auth::user()->cpf }}" disabled
                                class="input-field appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm sm:text-base">
                        </div>

                        <!-- Número (Telefone) -->
                        <div>
                            <label for="profile-number"
                                class="block text-sm font-medium text-prussianBlue mb-1">Telefone</label>
                            <input id="profile-number" type="tel" value="{{ Auth::user()->phone }}" disabled
                                class="input-field appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm sm:text-base">
                        </div>

                        <!-- Data de Nascimento (NOVO CAMPO) -->
                        <div>
                            <label for="profile-date-nasc" class="block text-sm font-medium text-prussianBlue mb-1">Data de
                                Nascimento</label>
                            <input id="profile-date-nasc" type="date" value="{{ Auth::user()->date_nasc }}" disabled
                                class="input-field appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm sm:text-base">
                        </div>

                        <!-- Email (Full Width) -->
                        <div>
                            <label for="profile-email"
                                class="block text-sm font-medium text-prussianBlue mb-1">Email</label>
                            <input id="profile-email" type="email" value="{{ Auth::user()->email }}" disabled
                                class="input-field appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm sm:text-base">
                        </div>

                        <!-- Botões de Ação (Full Width) -->
                        <div class="md:col-span-2 pt-4 flex justify-end space-x-4">

                            <!-- Botão Editar/Salvar -->
                            <button type="submit"
                                class="py-3 px-6 border border-transparent rounded-lg shadow-lg 
                                       text-lg font-semibold text-white bg-indigoDye hover:bg-prussianBlue transition duration-150">
                                <i class="fas fa-edit mr-2"></i> Editar Dados
                            </button>

                        </div>
                    </form>

                    <!-- Placeholder para outras configurações (ex: segurança) -->
                    <h3 class="text-xl font-bold text-prussianBlue mt-10 mb-6 border-b pb-3">Segurança</h3>
                    <p class="text-PaynesGray">Use a navegação lateral para alterar sua senha.</p>
                </div>
        </main>
    </div>
@endsection

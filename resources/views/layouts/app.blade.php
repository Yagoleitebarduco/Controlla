<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controlla @yield('title-page')</title>
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/Favicon.svg') }}" type="image/x-icon">
    {{-- FontAwesone --}}
    <script src="https://kit.fontawesome.com/ec8f13948e.js" crossorigin="anonymous"></script>
    {{-- Tailwindcss --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
                'Segoe UI Symbol', 'Noto Color Emoji';

            --color-prussianBlue: #023859;
            --color-richBlack: #081B26;
            --color-PaynesGray: #4A6572;
            --color-indigoDye: #025373;
            --color-hookersGreen: #4B7368;
            --color-dangerRed: #dc2626;
            --color-hookersGreenLight: #EAF3F1;
            --color-dangerRedLight: #FEEAEA;
            --color-warning: #F59E0B,
        }
    </style>
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>


<body>
    <!-- Container Principal do App -->
    <div class="flex h-screen bg-gray-100 font-sans">

        <!-- 1. BARRA LATERAL (SIDEBAR) -->
        <aside id="sidebar"
            class="sidebar bg-prussianBlue fixed md:relative z-30 h-full shrink-0 
                    sidebar-mobile-hidden md:block shadow-xl">

            <div class="flex flex-col h-full">

                <!-- Logo/Título do App - AGORA COM A MESMA COR DA BARRA LATERAL -->
                <div class="flex items-center justify-center h-20 bg-prussianBlue">
                    <span class="text-2xl font-extrabold text-white uppercase tracking-wider">Controlla</span>
                </div>

                <!-- Navegação Principal -->
                <nav class="grow p-4 overflow-y-auto">

                    <!-- 1. GESTÃO FINANCEIRA -->
                    <h3 class="text-xs uppercase text-gray-500 font-semibold mt-0 mb-2 px-3">Gestão Financeira</h3>
                    <div class="space-y-2">
                        <!-- Dashboard -->
                        <a href="{{ route('dashboard') }}"
                            class="nav-link flex items-center p-3 rounded-lg font-medium {{ request()->routeIs('dashboard') ? 'bg-indigoDye shadow-md text-white' : 'text-gray-300 hover:text-white transition duration-200 hover:bg-indigoDye/40' }}">
                            <i class="fas fa-gauge w-5 h-5 mr-3"></i>
                            Dashboard
                        </a>

                        <!-- Registro de Transação - AGORA SEM QUEBRA DE LINHA -->
                        <a href="{{ route('registerTransaction') }}"
                            class="flex items-center p-3 rounded-lg font-medium whitespace-nowrap {{ request()->routeIs('registerTransaction') ? 'bg-indigoDye shadow-md text-white' : 'text-gray-300 hover:text-white transition duration-200 hover:bg-indigoDye/40' }}">
                            <i class="fas fa-cash-register w-5 h-5 mr-3"></i>
                            Registro de Transação
                        </a>
                    </div>

                    <!-- 2. OPERAÇÕES E RECURSOS -->
                    <h3 class="text-xs uppercase text-gray-500 font-semibold mt-6 mb-2 px-3">Operações e Recursos</h3>
                    <div class="space-y-2">
                        <!-- Estoque -->
                        <a href="{{ route('stock') }}"
                            class="nav-link flex items-center p-3 rounded-lg  {{ request()->routeIs('stock') ? 'bg-indigoDye shadow-md text-white' : 'text-gray-300 hover:text-white transition duration-200 hover:bg-indigoDye/40' }}">
                            <i class="fas fa-boxes-stacked w-5 h-5 mr-3"></i>
                            Estoque
                        </a>
                        <!-- Documentos -->
                        <a href="#"
                            class="nav-link flex items-center p-3 rounded-lg text-gray-300 hover:text-white transition duration-200 hover:bg-indigoDye/40">
                            <i class="fas fa-folder w-5 h-5 mr-3"></i>
                            Documentos
                        </a>
                    </div>

                    <!-- 3. ANÁLISE -->
                    <h3 class="text-xs uppercase text-gray-500 font-semibold mt-6 mb-2 px-3">Análise</h3>
                    <div class="space-y-2">
                        <!-- Relatórios -->
                        <!-- Relatórios -->
                        <!-- Relatórios -->
                        <a href="{{ route('reports.index') }}" {{-- <<< Link atualizado --}}
                            class="nav-link flex items-center p-3 rounded-lg {{ request()->routeIs('reports.*') ? 'bg-indigoDye shadow-md text-white' : 'text-gray-300 hover:text-white transition duration-200 hover:bg-indigoDye/40' }}"> {{-- <<< Classe condicional atualizada --}}
                            <i class="fas fa-chart-line w-5 h-5 mr-3"></i>
                            Relatórios
                        </a>
                    </div>
                </nav>

                <!-- Seção Inferior: Perfil/Usuário - AGORA COM FUNDO MAIS ESCURO E ÍCONE BRANCO -->
                <div class="p-4 bg-richBlack">
                    <a href="{{ route('user.profile') }}"
                        class="nav-link flex items-center p-3 rounded-lg  {{ request()->routeIs('user.profile') ? 'bg-indigoDye shadow-md text-white' : 'text-gray-300 hover:text-white transition duration-200 hover:bg-indigoDye/40' }}">
                        <i class="fas fa-user w-5 h-5 mr-3 text-white"></i>
                        Perfil
                    </a>
                </div>
            </div>
        </aside>


        <!-- 2. CONTEÚDO PRINCIPAL (DASHBOARD) -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Header/Top Bar (Final e Reutilizável) -->
            <header class="flex items-center justify-between p-4 bg-white shadow-md shrink-0">
                <!-- Botão para Mobile (mostra/esconde a sidebar, implementado via JS/Laravel) -->
                <button id="menu-toggle" class="md:hidden text-prussianBlue focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>

                <!-- Título da Página (Repetível em todas as telas) -->
                <h1 class="text-xl font-semibold text-richBlack">
                    @yield('title')
                </h1>

                <!-- Ações do Usuário (Notificações e Perfil/Saudação) -->
                <div class="flex items-center space-x-4">
                    @yield('button-header')

                    <!-- Notificações (Botão Redondo) -->
                    <button
                        class="flex items-center justify-center h-10 w-10 p-2 bg-gray-100 rounded-full text-PaynesGray hover:text-prussianBlue hover:bg-gray-200 transition duration-150 relative">
                        <i class="fas fa-bell text-xl"></i>
                        <!-- Ponto de notificação (opcional) -->
                        <span
                            class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-hookersGreen"></span>
                    </button>

                    <!-- Saudação e Nome do Usuário (NOVO ELEMENTO) -->
                    <a href="{{ route('user.profile') }}" class="text-right flex items-center group cursor-pointer">
                        <div class="hidden sm:block">
                            <p class="text-sm font-medium text-black transition duration-150">
                                Olá, <span class="text-prussianBlue hover:text-indigoDye">{{ Auth::user()->name }}
                                    {{ Auth::user()->lastname }}</span>
                            </p>
                            <p class="text-xs text-PaynesGray">Acessar Perfil</p>
                        </div>
                        <!-- Avatar de Perfil Pequeno (Opcional, para complementar a saudação) -->
                        @if (Auth::user()->photo == null)
                        @else
                            <div
                                class="ml-3 flex items-center justify-center h-10 w-10 bg-indigoDye rounded-full text-white font-bold text-sm shrink-0">
                                Photo
                            </div>
                        @endif
                    </a>
                </div>
            </header>

            <!-- Área de Conteúdo (Dashboard) -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>

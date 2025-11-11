<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controlla - SignIn</title>
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
        }
    </style>
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <!-- Container Principal: Centraliza o formulário no meio da tela -->
    <div class="min-h-screen flex items-center justify-center p-4 font-sans bg-richBlack">
        <!-- Contêiner do Layout (Duas Colunas em telas grandes) -->
        <div class="w-full max-w-6xl flex rounded-2xl shadow-3xl overflow-hidden">

            <!-- SEÇÃO ESQUERDA: Boas-vindas e Benefícios (W-full no mobile, W-1/2 no desktop) -->
            <!-- Esta seção é a primeira no HTML, aparecendo à esquerda em telas grandes -->
            <div class="hidden md:flex md:w-1/2 bg-prussianBlue items-center justify-center p-8 sm:p-10 text-white">
                <div class="text-center flex flex-col justify-center items-center space-y-8 max-w-sm h-full">
                    <!-- Título -->
                    <h2 class="text-4xl lg:text-5xl font-extrabold tracking-tight">
                        Controlla sua vida financeira!
                    </h2>
                    <!-- Subtexto de Apoio -->
                    <p class="text-xl lg:text-2xl text-gray-300 mb-6">
                        O seu parceiro ideal para um controle de estoque e finanças simples, rápido e eficiente.
                    </p>

                    <!-- Lista de Benefícios -->
                    <div class="space-y-6 text-left w-full">

                        <!-- Benefício 1: Controle Financeiro -->
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-chart-line text-3xl text-hookersGreen shrink-0 mt-1"></i>
                            <div>
                                <h3 class="text-lg font-bold text-gray-100">Visão Financeira Completa</h3>
                                <p class="text-sm text-gray-300">Monitore receitas e despesas em tempo real com
                                    relatórios detalhados.</p>
                            </div>
                        </div>

                        <!-- Benefício 2: Gestão de Estoque -->
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-boxes-stacked text-3xl text-hookersGreen shrink-0 mt-1"></i>
                            <div>
                                <h3 class="text-lg font-bold text-gray-100">Estoque Otimizado</h3>
                                <p class="text-sm text-gray-300">Controle o inventário, evite rupturas e gerencie
                                    fornecedores.</p>
                            </div>
                        </div>

                        <!-- Benefício 3: Produtividade -->
                        <div class="flex items-start space-x-4">
                            <i class="fas fa-bolt text-3xl text-hookersGreen shrink-0 mt-1"></i>
                            <div>
                                <h3 class="text-lg font-bold text-gray-100">Eficiência e Agilidade</h3>
                                <p class="text-sm text-gray-300">Automatize tarefas e ganhe mais tempo para focar no
                                    crescimento.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- SEÇÃO DIREITA: Formulário de Registro (W-full no mobile, W-1/2 no desktop) -->
            <!-- Esta seção é a segunda no HTML, aparecendo à direita em telas grandes -->
            <div class="w-full md:w-1/2 bg-white p-8 sm:p-10">

                <!-- Título e Subtítulo do Formulário -->
                <div class="text-center">
                    <!-- Título -->
                    <h2 class="text-3xl font-extrabold text-prussianBlue tracking-tight">
                        Crie sua conta
                    </h2>
                    <!-- Subtítulo de Apoio -->
                    <p class="mt-2 text-base text-PaynesGray">
                        Preencha seus dados para iniciar o gerenciamento.
                    </p>
                </div>

                <!-- Formulário de Registro -->
                <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <!-- Campos em Grid (2 Colunas em telas maiores) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-6">

                        <!-- Nome -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-prussianBlue">
                                Primeiro Nome
                            </label>
                            <div class="mt-1">
                                <input id="name" name="name" type="text" autocomplete="given-name" required
                                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                            </div>
                        </div>

                        <!-- Sobrenome -->
                        <div>
                            <label for="lastname" class="block text-sm font-medium text-prussianBlue">
                                Sobrenome
                            </label>
                            <div class="mt-1">
                                <input id="lastname" name="lastname" type="text" autocomplete="family-name" required
                                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                            </div>
                        </div>

                        <!-- CPF -->
                        <div>
                            <label for="cpf" class="block text-sm font-medium text-prussianBlue">
                                CPF
                            </label>
                            <div class="mt-1">
                                <input id="cpf" name="cpf" type="text" inputmode="numeric" required
                                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                            </div>
                            @error('cpf')
                                <div class="mt-2 text-sm text-red-600 bg-red-100 p-3 rounded-lg border border-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Telefone (Number) -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-prussianBlue">
                                Telefone
                            </label>
                            <div class="mt-1">
                                <input id="phone" name="phone" type="text" autocomplete="tel" required
                                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                            </div>
                            @error('phone')
                                <div class="mt-2 text-sm text-red-600 bg-red-100 p-3 rounded-lg border border-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Data de Nascimento -->
                        <div class="sm:col-span-2">
                            <label for="date_nasc" class="block text-sm font-medium text-prussianBlue">
                                Data de Nascimento
                            </label>
                            <div class="mt-1">
                                <input id="date_nasc" name="date_nasc" type="date" autocomplete="bday" required
                                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                            </div>
                            @error('date_nasc')
                                <div class="mt-2 text-sm text-red-600 bg-red-100 p-3 rounded-lg border border-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium text-prussianBlue">
                                Endereço de E-mail
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                            </div>
                            @error('email')
                                <div class="mt-2 text-sm text-red-600 bg-red-100 p-3 rounded-lg border border-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Senha -->
                        <div class="sm:col-span-2">
                            <label for="password" class="block text-sm font-medium text-prussianBlue">
                                Senha
                            </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" autocomplete="new-password"
                                    required
                                    class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm placeholder-PaynesGray input-field sm:text-base">
                            </div>
                        </div>
                    </div>

                    <!-- Botão de Registro (Full width) -->
                    <div class="pt-4">
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-lg 
                                       text-lg font-semibold text-white bg-hookersGreen hover:bg-prussianBlue 
                                       transition duration-300 ease-in-out transform hover:scale-[1.01] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-hookersGreen">
                            Criar Conta
                        </button>
                    </div>
                </form>

                <!-- Link para Login -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-PaynesGray">
                        Já tem conta?
                        <a href="{{ route('login') }}"
                            class="font-medium text-indigoDye hover:text-prussianBlue transition duration-150 ease-in-out">
                            Faça Login
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Máscara para CPF: 000.000.000-00
            $('#cpf').mask('000.000.000-00');

            // Máscara Dinâmica para Telefone/Celular:
            var behavior = function(val) {
                    // Remove todos os caracteres não numéricos para contagem
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                options = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(behavior.apply({}, arguments), options);
                    }
                };

            // Aplica a máscara dinâmica ao campo de telefone
            $('#phone').mask(behavior, options);
        });
    </script>
</body>

</html>

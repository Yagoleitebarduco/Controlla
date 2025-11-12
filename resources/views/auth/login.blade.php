<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controlla - SignUp</title>
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/Favicon.svg') }}" type="image/x-icon">
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
</head>

<body>
    <!-- Container Principal: Centraliza o formulário no meio da tela -->
    <div
        class="min-h-screen flex items-center justify-center p-4 font-sans bg-linear-135 to-0% to-indigoDye from-100% from-prussianBlue">

        <!-- Card de Login (Único) -->
        <div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-xl shadow-2xl">

            <!-- Título e Subtítulo -->
            <div class="text-center">
                <!-- Título -->
                <h2 class="text-3xl font-extrabold text-prussianBlue tracking-tight">
                    Acesse sua conta Controlla
                </h2>
                <!-- Subtítulo de Apoio -->
                <p class="mt-2 text-sm text-PaynesGray">
                    Seu controle financeiro e de estoque começa aqui.
                </p>
            </div>

            <!-- Formulário -->
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Campo de E-mail -->
                <div>
                    <label for="email" class="block text-sm font-medium text-prussianBlue">
                        Endereço de E-mail
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-PaynesGray input-field sm:text-sm">
                    </div>
                    @error('email')
                        <div class="mt-2 text-sm text-red-600 bg-red-100 p-3 rounded-lg border border-red-400">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Campo de Senha -->
                <div>
                    <label for="password" class="block text-sm font-medium text-prussianBlue">
                        Senha
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-PaynesGray input-field sm:text-sm">
                    </div>
                    @error('password')
                        <div class="mt-2 text-sm text-red-600 bg-red-100 p-3 rounded-lg border border-red-400">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Lembre-me e Esqueceu a Senha -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 text-indigoDye border-gray-300 rounded focus:ring-indigoDye checkbox-custom">
                        <label for="remember-me" class="ml-2 block text-sm text-PaynesGray">
                            Lembrar-me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigoDye hover:text-prussianBlue">
                            Esqueceu sua senha?
                        </a>
                    </div>
                </div>

                <!-- Botão de Acesso -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm 
                                   text-base font-medium text-white bg-indigoDye hover:bg-prussianBlue 
                                   transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigoDye">
                        Acessar
                    </button>
                </div>
            </form>

            <!-- Link para Cadastro -->
            <div class="mt-6 text-center">
                <p class="text-sm text-PaynesGray">
                    Ainda não tem conta?
                    <a href="{{ route('register') }}" class="font-medium text-hookersGreen hover:text-prussianBlue">
                        Cadastre-se aqui
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>

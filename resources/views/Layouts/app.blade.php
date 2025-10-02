<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controlla | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <aside>
        <section class="title-aside">
            <h2>Controlla</h2>
        </section>


        <section class="nav-item">
            <h3>Painel</h3>

            <ul>
                <li class="link-item {{ request()->routeIs('painel.index') ? 'active' : '' }}">
                    <img src="{{ asset('assets/svg/aside/home.svg') }}" alt="Icon Home">
                    <a href="{{ route('painel.index') }}">Dashboard</a>
                </li>

                <li class="link-item">
                    <img src="{{ asset('assets/svg/aside/relatorios.svg') }}" alt="Icon Relatorios">
                    <a href="#">Relatórios</a>
                </li>

                <li class="link-item">
                    <img src="{{ asset('assets/svg/aside/estoque.svg') }}" alt="Icon Estoque">
                    <a href="#">Estoque</a>
                </li>

                <li class="link-item">
                    <img src="{{ asset('assets/svg/aside/documentos.svg') }}" alt="Icon Documentos">
                    <a href="#">Documentos</a>
                </li>
            </ul>
        </section>

        <section class="nav-item">
            <h3>Transação</h3>

            <ul>
                <li class="link-item">
                    <img src="{{ asset('assets/svg/aside/transacao.svg') }}" alt="Icon Transação">
                    <a href="#">Registro de Transação</a>
                </li>

                <li class="link-item">
                    <img src="{{ asset('assets/svg/aside/recorrentes.svg') }}" alt="Icon Recorrentes">
                    <a href="#">Recorrentes</a>
                </li>
            </ul>
        </section>

        <section class="nav-item">
            <h3>Conta</h3>

            <ul>
                <li class="link-item">
                    <img src="{{ asset('assets/svg/aside/config.svg') }}" alt="Icon Configurações">
                    <a href="#">Configurações</a>
                </li>

                <li class="link-item">
                    <img src="{{ asset('assets/svg/aside/conta.svg') }}" alt="Icon Conta">
                    <a href="#">Conta</a>
                </li>
            </ul>
        </section>
    </aside>

    <main>
        @yield('content')
    </main>
</body>

</html>

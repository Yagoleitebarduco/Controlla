@extends('Layouts.app')
@section('title')
    | Relatorios
@endsection

@section('content')
    <header>
    @section('title-page')
        Relatorios
    @endsection
    @include('layouts.header')
</header>

<hr>

<section class="container-relatorios">
    <section class="filtro-relatorios">
        <section class="title-filtro-relatorios">
            <h3>Filtro Relatórios</h3>
        </section>

        <section class="content-filtro-relatorios">
            <section class="item-filtro-relatorios">
                <section class="item-filtro">
                    <label>Tipo de Relatorio</label>

                    <select name="tipo-relatorio">
                        <option selected>Todos</option>
                        <option>Financeiro</option>
                        <option>Estoque</option>
                        <option>Vendas</option>
                        <option>Produção</option>
                    </select>
                </section>

                <section class="item-filtro">
                    <label>Periodo</label>

                    <select name="periodo-relatorio">
                        <option selected>Ultimos 7 dias</option>
                        <option>Ultimos 30 dias</option>
                        <option>Este Mês</option>
                        <option>Mês Anterior</option>
                        <option>Perzonalizado</option>
                    </select>
                </section>
            </section>

            <section class="item-filtro-relatorios">
                <section class="item-filtro">
                    <label>Data Inicial</label>
                    <input type="date" name="dataInicial">
                </section>

                <section class="item-filtro">
                    <label>Data Final</label>

                    <input type="date" name="dataFinal">
                </section>
            </section>
        </section>

        <section class="buttons-filtro">
            <button class="limpar-filtros">Limpar Filtros</button>
            <button class="aplicar-filtros">Aplicar Filtros</button>
        </section>
    </section>

    <section class="link-relatorios">
        <section class="link-relatorio">
            
        </section>
    </section>
</section>
@endsection

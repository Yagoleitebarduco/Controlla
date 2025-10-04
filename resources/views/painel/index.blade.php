@extends('layouts.app')
@section('title')
    | Dashboard
@endsection

@section('content')
    <header>
        @section('title-page')
            Dashboard
        @endsection
        @include('layouts.header')
    </header>

    <hr>

    <section class="container-dashboard">
        <section class="info-flash">
            <section class="info-dashboard">
                <section class="title-info">
                    <h3>Total em Caixa</h3>
                    <img src="{{ asset('assets/svg/dashboard/carteira.svg') }}" alt="Icon Card">
                </section class="title-info">

                <section class="value-info">
                    <h2>R$ 42.567,00</h2>
                    <span>+5.2% desde o mês passado</span>
                </section>
            </section>

            <section class="info-dashboard">
                <section class="title-info">
                    <h3>Transação</h3>
                    <img src="{{ asset('assets/svg/dashboard/transacao.svg') }}" alt="Icon Transação">
                </section class="title-info">

                <section class="value-info">
                    <h2>128</h2>
                    <span>+12 este mês</span>
                </section>
            </section>

            <section class="info-dashboard">
                <section class="title-info">
                    <h3>Produtos em Estoque</h3>
                    <img src="{{ asset('assets/svg/dashboard/estoque.svg') }}" alt="Icon Estoque">
                </section class="title-info">

                <section class="value-info">
                    <h2>2.458</h2>
                    <span>-32 desde a semana Passada</span>
                </section>
            </section>
        </section>

        <section class="content-dashboard">
            <section class="title-recentes">
                <h2>Transações recentes</h2>
            </section>

            <section class="table-recentes">
                <table>
                    <thead>
                        <tr class="sub">
                            <th>Produto</th>
                            <th>Categoria</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody class="corpo-tabela-recente">
                        <tr>
                            <td>Fertilizantes NPK</td>
                            <td>Insumos</td>
                            <td>15/09/26</td>
                            <td>R$ 4.500,00</td>
                            <td class="debito">Debito</td>
                        </tr>

                        <tr>
                            <td>Venda de Soja</td>
                            <td>Grãos</td>
                            <td>28/10/22</td>
                            <td>R$ 12.450,00</td>
                            <td class="credito">Credito</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </section>
@endsection

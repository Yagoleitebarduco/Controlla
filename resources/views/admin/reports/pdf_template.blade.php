<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';
            margin: 40px;
            color: #081B26; /* richBlack */
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #023859; /* prussianBlue */
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 24px;
            font-weight: bold;
            color: #023859; /* prussianBlue */
            margin: 0;
        }
        .header .date {
            font-size: 12px;
            color: #4A6572; /* PaynesGray */
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
            color: #4A6572; /* PaynesGray */
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10px;
            color: #4A6572; /* PaynesGray */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <div class="date">Gerado em: {{ $date_generated }}</div>
    </div>

    <table>
        <thead>
            <tr>
                @if ($title == 'Inventário Atualizado de Estoque')
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Total</th>
                @else
                    <th>Descrição</th>
                    <th>Valor (R$)</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    @if ($title == 'Inventário Atualizado de Estoque')
                        <td>{{ $item['product'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($item['quantity'] * $item['price'], 2, ',', '.') }}</td>
                    @else
                        <td>{{ $item['description'] }}</td>
                        <td>R$ {{ number_format($item['value'], 2, ',', '.') }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Controlla - Sistema de Gestão Integrada | Este documento foi gerado automaticamente.
    </div>
</body>
</html>
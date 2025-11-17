<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Stock; // <<< Substitua 'Product' por 'Stock'
use App\Models\RegisterTransaction; // <<< Substitua 'Transaction' por 'RegisterTransaction'
use App\Models\Report; // <<< Adicione esta linha


class ReportController extends Controller
{
    /**
     * Mostra a tela de relatórios (histórico).
     */
    public function index()
    {
        // Busca os relatórios do banco de dados, ordenados pela data de geração (mais recentes primeiro)
        $reports = Report::orderBy('generated_at', 'desc')->get();

        // Passa os relatórios para a view
        return view('admin.reports.report', compact('reports'));
    }

    /**
     * Mostra a tela de geração de relatórios.
     */
    public function generate()
    {
        // Caminho alterado para onde o arquivo realmente está
        return view('admin.reports.generate');
    }

       /**
     * Gera o PDF com base no tipo selecionado e salva no histórico.
     */
    public function download(Request $request)
    {
        $request->validate([
            'report_type' => 'required|in:stock_inventory,financial_statement,sales_report',
        ]);

        $type = $request->input('report_type');

        $data = [
            'title' => $this->getReportTitle($type),
            'date_generated' => now()->format('d/m/Y H:i'),
            'items' => $this->getReportData($type),
        ];

        // Caminho alterado para onde o arquivo realmente está
        $pdf = Pdf::loadView('admin.reports.pdf_template', $data);
        $filename = "relatorio_{$type}_" . now()->format('Ymd_His') . ".pdf";

        // Salva o registro do relatório no banco de dados
        Report::create([
            'type' => $type,
            'title' => $data['title'],
            'filename' => $filename,
        ]);

        return $pdf->download($filename);
    }

    /**
     * Obtém o título do relatório com base no tipo.
     */
    private function getReportTitle($type)
    {
        switch ($type) {
            case 'stock_inventory':
                return 'Inventário Atualizado de Estoque';
            case 'financial_statement':
                return 'Demonstração de Resultados Financeiros';
            case 'sales_report':
                return 'Relatório de Vendas Mensal';
            default:
                return 'Relatório Gerado';
        }
    }

    /**
     * Obtém os dados reais do relatório do banco de dados com base no tipo.
     */
private function getReportData($type)
{
    switch ($type) {
        case 'stock_inventory':
            // Busca todos os produtos do banco de dados (usando o Model Stock)
            return Stock::select('name_product as product', 'max_stock as quantity', 'unit_value as price')->get()->toArray();

case 'financial_statement':
    // Busca transações do banco de dados
    $transactions = RegisterTransaction::with('TypeTransaction')->get(); // <<< Correção aqui
    $data = [];
    foreach ($transactions as $t) {
        $data[] = [
            'description' => $t->description_sale,
            'value' => $t->value_transaction,
            'formatted_value' => ($t->TypeTransaction_id == 1 ? '+' : '-') . ' R$ ' . number_format($t->value_transaction, 2, ',', '.')
        ];
    }
    return $data;

            case 'sales_report':
                // Exemplo: Busca transações de tipo 'Receita' (TypeTransaction_id = 1)
                // Supondo que o Model Transaction tenha: description_sale, value_transaction
                $salesTransactions = Transaction::where('TypeTransaction_id', 1)->get(); // Ajuste o ID conforme sua tabela TypeTransaction
                $data = [];
                foreach ($salesTransactions as $sale) {
                    $data[] = [
                        'product' => $sale->description_sale, // Ajuste o campo conforme necessário
                        'sales' => 1, // Exemplo: Contar cada transação como 1 venda
                        'revenue' => $sale->value_transaction,
                    ];
                }
                return $data;

            default:
                return [];
        }
    }
}
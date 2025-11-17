<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // 'stock_inventory', 'financial_statement', 'sales_report'
        $table->string('title'); // Título do relatório gerado
        $table->string('filename'); // Nome do arquivo PDF gerado
        $table->timestamp('generated_at')->useCurrent(); // Data/hora da geração
        $table->timestamps(); // created_at, updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};

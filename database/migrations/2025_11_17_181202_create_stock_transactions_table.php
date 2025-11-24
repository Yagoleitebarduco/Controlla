<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->id();

            // Foreign Key de Registro de Transação
            $table->foreignId('RegisterTransaction_id')->constrained('register_transactions')->onDelete('cascade');
            // Foreign Key de Estoque
            $table->foreignId('Stock_id')->constrained('stocks')->onDelete('cascade');

            $table->integer('quantity');
            $table->decimal('value_transaction', 10, 2);

            $table->unique(['RegisterTransaction_id', 'Stock_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_transactions');
    }
};

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
        Schema::create('registro_transacaos', function (Blueprint $table) {
            $table->id();
            $table->string('type_Transaction');
            $table->text('descricao_Venda');
            $table->string('valor');
            $table->date('date_entrada');
            $table->string('categoria'); // Alterar para uma tabela Externa
            $table->string('type_pagament'); // Alterar para uma tabela Externa
            $table->string('status_Transacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_transacaos');
    }
};

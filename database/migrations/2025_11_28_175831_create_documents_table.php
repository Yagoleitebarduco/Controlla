<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Associa ao usuário
            $table->string('original_name'); // Nome original do arquivo
            $table->string('stored_name');   // Nome armazenado no disco
            $table->string('extension');     // Extensão do arquivo
            $table->string('mime_type');     // Tipo MIME (ex: application/pdf)
            $table->unsignedBigInteger('size'); // Tamanho em bytes
            $table->string('path');          // Caminho relativo (ex: documents/arquivo.pdf)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
};
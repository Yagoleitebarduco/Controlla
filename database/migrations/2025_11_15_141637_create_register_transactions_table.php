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
        Schema::create('register_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('TypeTransaction_id')->constrained('type_transactions')->onDelete('cascade');
            $table->text('description_sale');
            $table->string('value_transaction');
            $table->date('entry_date');
            $table->foreignId('Category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('TypePayment_id')->constrained('type_payments')->onDelete('cascade');
            $table->string('status_transaction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_transactions');
    }
};

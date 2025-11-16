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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('cod')->unique();
            $table->string('name_product');
            $table->foreignId('Category_id')->constrained('categories')->onDelete('cascade');
            $table->decimal('unit_value', 10, 2);
            $table->string('unit_measure');
            $table->bigInteger('min_stock');
            $table->bigInteger('max_stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};

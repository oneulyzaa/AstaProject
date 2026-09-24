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
      Schema::create('size_chart_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('size_chart_id')->constrained()->cascadeOnDelete();
    $table->string('size');                       // S, M, L, XL
    $table->decimal('width', 5, 1)->nullable();   // lebar dada (cm)
    $table->decimal('length', 5, 1)->nullable();  // panjang badan (cm)
    $table->decimal('sleeve', 5, 1)->nullable();  // panjang lengan (cm)
    $table->string('notes')->nullable();
    $table->unsignedInteger('sort_order')->default(0);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size_chart_items');
    }
};

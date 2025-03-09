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
        Schema::create('itens_inspecionados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspecao_id')->constrained('inspecoes')->onDelete('cascade');
            $table->string('item');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_inspecionados');
    }
};

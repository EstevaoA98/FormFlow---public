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
        Schema::create('inspecoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipamento_id')->constrained()->onDelete('cascade');
            $table->date('data_teste');
            $table->boolean('apto');
            $table->text('obs')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspecoes');
    }
};

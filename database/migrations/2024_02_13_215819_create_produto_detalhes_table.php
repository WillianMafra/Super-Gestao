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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id'); //unsigned nao aceita numero negativo e signed aceita numero negativo
            $table->float('comprimento', 8, 2);
            $table->float('altura', 8, 2);
            $table->float('largura', 8, 2);
            $table->timestamps();

            // constraints
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id'); // relacao 1 para 1
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_detalhes');
    }
};

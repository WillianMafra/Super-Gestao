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
        Schema::table('produtos', function (Blueprint $table){
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table){
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });

    }
};

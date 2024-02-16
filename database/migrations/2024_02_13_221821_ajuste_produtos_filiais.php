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
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        Schema::create('produtos_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            // constraints

            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn(['estoque_minimo', 'preco_venda', 'estoque_maximo']); // Remover as colunas pois agora o produto tem estoque de acordo com a filial
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos_filiais');

        Schema::dropIfExists('filiais');

        Schema::table('produtos', function(Blueprint $table){
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->decimal('preco_venda', 8, 2);
        });
    }
};

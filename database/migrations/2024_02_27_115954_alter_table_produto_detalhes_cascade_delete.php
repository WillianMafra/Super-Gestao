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
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->dropForeign('produto_detalhes_produto_id_foreign');
            $table->foreign('produto_id')
            ->references('id')->on('produtos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->dropForeign('produto_detalhes_produto_id_foreign');
            $table->foreign('produto_id')
            ->references('id')->on('produtos');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_contatos', function (Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id')->nullable();
        });

        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        // Foreign Key
        Schema::table('site_contatos', function (Blueprint $table){
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contatos', function (Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivos_contatos_id_foreign');
        });

        DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table){
            $table->dropColumn('motivos_contatos_id');
        });
    }
};

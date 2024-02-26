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
        Schema::table('fornecedores', function (Blueprint $table){
            $table->unsignedBigInteger('estado_id')->nullable();
        });

        DB::statement('update fornecedores f set estado_id = (select id from estados e where e.uf = f.uf)');

        // Foreign Key
        Schema::table('fornecedores', function (Blueprint $table){
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->dropColumn('uf');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fornecedores', function (Blueprint $table){
            $table->dropForeign('fornecedores_estado_id_foreign');
            $table->string('uf', 2)->nullable();
        });

        DB::statement('update fornecedores f set uf = (select uf from estados e where e.id = f.estado_id)');

        Schema::table('fornecedores', function (Blueprint $table){
            $table->dropColumn('estado_id');
        });
    }
};

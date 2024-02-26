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
        Schema::table('produtos', function(Blueprint $table){
            $table->float('peso_novo');
        });

        DB::statement('update produtos p set peso_novo = peso');

        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn('peso');
            $table->renameColumn('peso_novo', 'peso');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function(Blueprint $table){
            $table->renameColumn('peso', 'peso_novo');
        });

        Schema::table('produtos', function(Blueprint $table){
            $table->integer('peso');
        });

        DB::statement('update produtos p set peso = peso_novo');

        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn('peso_novo');
        });

    }
};

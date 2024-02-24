<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor Seeder';
        $fornecedor->site = 'Fornecedor Seeder Site';
        $fornecedor->estado_id = '2';
        $fornecedor->email = 'email@seeder';
        $fornecedor->save();

        // OU

        $dados = [
            'nome' => 'Fornecedor Seeder 2',
            'site' => 'Fornecedor Seeder 2',
            'estado_id' => '1',
            'email' => 'email@seeder2',
        ];
        DB::table('fornecedores')->insert($dados);

        \App\Models\Fornecedor::factory()->count(50)->create();


    }


}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unidade;

class unidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dados = [
            'UN' => 'Unidade',
            'KG' => 'Quilograma',
            'M' => 'Metro',
            'PC' => 'Peças'
        ];

        foreach ($dados as $chave => $valor){
            $unidadeMedida = new Unidade;
            $unidadeMedida->unidade = $chave;
            $unidadeMedida->descricao = $valor;
            $unidadeMedida->save();
        }
    }
}

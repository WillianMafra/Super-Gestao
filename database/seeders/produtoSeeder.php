<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;

class produtoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $produtos = [
            '0' => [
                'nome' => 'Notebook',
                'descricao' => 'Notebook 15 polegadas',
                'unidade_id' => '1',
                'peso' => '1.3',
                'fornecedor_id' => 1
            ],
            '1' => [
                'nome' => 'Televisão',
                'descricao' => 'Ultra High Definition',
                'unidade_id' => '1',
                'peso' => '2.5',
                'fornecedor_id' => 2
            ],
            '2' => [
                'nome' => 'Celular',
                'descricao' => 'Ultima Geração',
                'unidade_id' => '1',
                'peso' => '0.4',
                'fornecedor_id' => 3
            ],
            '3' => [
                'nome' => 'Ração Pedigree',
                'descricao' => 'Ração para cachorro',
                'unidade_id' => '2',
                'peso' => '1',
                'fornecedor_id' => 5
            ]
        ];
        foreach ($produtos as $chave => $valor){
            $produto = new Produto();
            $produto->nome = $valor['nome'];
            $produto->descricao = $valor['descricao'];
            $produto->unidade_id = $valor['unidade_id'];
            $produto->peso = $valor['peso'];
            $produto->fornecedor_id = $valor['fornecedor_id'];
            $produto->save();    
        }
    }
}

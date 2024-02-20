<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\siteContato;
use Database\Factories\siteContatoFactory;
use Illuminate\Support\Facades\DB;
\App\Models\SiteContato::factory()->count(100)->create();

class siteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contato = new siteContato();
        $contato->nome = 'SiteContato Seeder';
        $contato->telefone = '47999999999';
        $contato->email = 'sitecontatoSeeder1';
        $contato->motivo_contato = '1';
        $contato->mensagem = 'Testando Seeder';
        $contato->save();


        $dados = [
            'nome' => 'SiteContato Seeder2',
            'telefone' => '47999999999',
            'email' => 'sitecontatoSeeder2',
            'motivo_contato' => '3',
            'mensagem' => 'Testando Seeder 2'
        ];
        DB::table('site_contatos')->insert($dados);

        \App\Models\SiteContato::factory()->count(100)->create();
    }
}

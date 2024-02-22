<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\motivoContato;

class motivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        motivoContato::create(['descricao' => 'Dúvida']);
        motivoContato::create(['descricao' => 'Elogio']);
        motivoContato::create(['descricao' => 'Reclamação']);

    }
}

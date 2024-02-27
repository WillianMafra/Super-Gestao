<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(estadoSeeder::class);
        $this->call(fornecedorSeeder::class);
        $this->call(clienteSeeder::class);
        $this->call(motivoContatoSeeder::class);
        $this->call(siteContatoSeeder::class);
        $this->call(userSeeder::class);
        $this->call(unidadeSeeder::class);
        $this->call(produtoSeeder::class);
        
    }
}

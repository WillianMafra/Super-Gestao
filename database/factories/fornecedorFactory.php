<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\fornecedor>
 */
class fornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            //criado na aula 119 factories

            'nome' => fake()->name(),

            'site' => fake()->domainName(),

            'email' => fake()->email(),

            'estado_id' => fake()->numberBetween(1, 27)

        ];
    }
}

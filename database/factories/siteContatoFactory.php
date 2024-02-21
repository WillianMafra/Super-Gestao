<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\siteContato;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\siteContato>
 */
class siteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()

    {

        return [

            //criado na aula 119 factories

            'nome' => fake()->name(),

            'telefone' => fake()->cellphoneNumber(),

            'email' => fake()->email(),

            'motivo_contato' => fake()->numberBetween(1,3),

            'mensagem' => fake()->sentence(4)

        ];

    }
}

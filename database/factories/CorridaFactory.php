<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Corrida>
 */
class CorridaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Corrida::class;

    public function definition()
    {
        return [
            'preco' => $this->faker->randomFloat(2, 10, 100),
            'data' => $this->faker->date(),
            'nome_cliente' => $this->faker->name,
        ];
}
}

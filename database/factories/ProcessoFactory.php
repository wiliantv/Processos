<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Pessoa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pessoa = Pessoa::orderBy(DB::raw('RAND()'))->limit(1)->get()[0];
        return [
            "numero" => $this->faker->unique()->randomNumber(),
            "classe" => Str::random(10),
            "andamento" => Str::random(10),
            "audiencia" => $this->faker->dateTimeBetween('-1 years', '+2 years'),
            "valor" => $this->faker->randomNumber(),
            "id_pessoa" => $pessoa->id,
            "id_usuario" => $pessoa->id_usuario,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => $this->faker->unique()->randomNumber(),
            'nome' => $this->faker->name(),
            'telefone' => $this->faker->phoneNumber(),
            'rg' => "1233",
            'estado_civil' => Str::random(10),
            'endereco' => $this->faker->streetAddress(),
            'profissao' => Str::random(10),
            'id_usuario' => User::orderBy(DB::raw('RAND()'))->limit(1)->get()[0]->id,
        ];
    }
}

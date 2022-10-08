<?php

namespace Database\Factories;

use App\Models\Processo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrasoProcessoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $processo = Processo::orderBy(DB::raw('RAND()'))->limit(1)->get()[0];
        return [
            "tipo" => Str::random(10),
            "data_final" => $this->faker->dateTimeBetween('now',"+30 days" ),
            "id_processo" => $processo->id,
            "id_usuario" => $processo->id_usuario,
        ];
    }
}

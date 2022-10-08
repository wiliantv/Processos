<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(["email" => 'wilianfragoso@gmail.com', "password" => Hash::make('135790'), "name" => 'Administrador']);
         \App\Models\User::factory(3)->create();
         \App\Models\Pessoa::factory(500)->create();
         \App\Models\Processo::factory(2000)->create();
         \App\Models\PrasoProcesso::factory(2000)->create();

    }
}

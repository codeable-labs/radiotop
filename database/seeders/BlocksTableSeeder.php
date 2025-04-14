<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('blocks')->insert([
                'titulo' => $faker->sentence(3), // Título ficticio
                'tipo_enlace' => $faker->numberBetween(1, 3), // Valores predefinidos: 1, 2 o 3
                'enlace' => $faker->url, // URL ficticia
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

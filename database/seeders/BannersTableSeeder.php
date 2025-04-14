<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los IDs de la tabla 'registers'
        $registerIds = DB::table('registers')->pluck('id');

        // Insertar 10 registros en la tabla 'banners'
        for ($i = 0; $i < 10; $i++) {
            DB::table('banners')->insert([
                'imagen' => $faker->imageUrl(640, 480, 'music', true, 'Faker'),
                'titulo' => $faker->sentence(3),
                'autor' => $faker->name,
                'cancion' => $faker->optional()->sentence(2),
                'register_id' => $faker->randomElement($registerIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PublicitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los IDs de la tabla 'places'
        $placeIds = DB::table('places')->pluck('id');

        for ($i = 0; $i < 10; $i++) {
            DB::table('publicities')->insert([
                'place_id' => $faker->randomElement($placeIds), // Usar un ID real de 'places'
                'imagen' => $faker->imageUrl(640, 480, 'business', true, 'Publicidad'),
                'impresiones' => $faker->numberBetween(0, 100),
                'url' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

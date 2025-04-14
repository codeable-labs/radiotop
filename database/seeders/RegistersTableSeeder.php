<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RegistersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los IDs de las tablas relacionadas
        $artistIds = DB::table('artists')->pluck('id');
        $regionIds = DB::table('regions')->pluck('id');
        $genderIds = DB::table('genders')->pluck('id');

        // Insertar 10 registros en la tabla 'registers'
        for ($i = 0; $i < 10; $i++) {
            DB::table('registers')->insert([
                'artist_id' => $faker->randomElement($artistIds), 
                'region_id' => $faker->randomElement($regionIds), 
                'gender_id' => $faker->randomElement($genderIds), 
                'archivo' => $faker->word . '.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

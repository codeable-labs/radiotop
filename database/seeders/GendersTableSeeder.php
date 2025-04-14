<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GendersTableSeeder extends Seeder
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
            DB::table('genders')->insert([
                'nombre' => $faker->word,
                'icono' => $faker->image('public/storage/icons', 100, 100, null, false),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            ['nombre' => 'Página principal', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Barra lateral', 'created_at' => now(), 'updated_at' => now()],
            ['nombre' => 'Pie de página', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

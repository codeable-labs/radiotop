<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(([
            ArtistsTableSeeder::class,
            RegionsTableSeeder::class,
            GendersTableSeeder::class,
            RegistersTableSeeder::class,
            BannersTableSeeder::class,
            UsersTableSeeder::class,
            PlacesTableSeeder::class,
            PublicitiesTableSeeder::class,
            BlocksTableSeeder::class,
        ]));
    }
}

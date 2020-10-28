<?php

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
        $this->call(LaratrustSeeder::class);
        // $this->call(LocationsSeeder::class);
        $this->call(OkProvincesTableSeeder::class);
        $this->call(OkCitiesTableSeeder::class);
        $this->call(OkSubdistrictsTableSeeder::class);
    }
}

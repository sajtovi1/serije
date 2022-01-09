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
        $this->call(SezonaSeeder::class);
        $this->call(EpizodeSeeder::class);
        $this->call(UsersSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = \Faker\Factory::create();

        $password = Hash::make('sifra123');


        User::create([
            'name' => 'Marko Ruzic',
            'email' => 'marko@serije.com',
            'password' => $password,
        ]);

        for ($i = 0; $i < 50; $i++) {

            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}

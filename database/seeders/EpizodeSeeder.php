<?php

namespace Database\Seeders;

use App\Models\Epizoda;
use Illuminate\Database\Seeder;

class EpizodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Epizoda::truncate();

        $brojEpizode = 1;

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++){
            Epizoda::create([
                'broj' => $brojEpizode,
                'opis' => implode('. ', $faker->sentences),
                'sezona_id' => rand(1,5),
                'ocena' => rand(1,10)
            ]);
            $brojEpizode++;

            if($brojEpizode == 10){
                $brojEpizode = 1;
            }
        }


    }
}

<?php

namespace Database\Seeders;

use App\Models\Sezona;
use Illuminate\Database\Seeder;

class SezonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sezona::truncate();

        for ($i = 1; $i < 6; $i++){
            Sezona::create([
                'naziv_sezone' => 'Sezona ' . $i
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        City::Factory(10)->create();
        // City::create(['name'=>'Rafah','active'=>true]);
        // City::create(['name'=>'Khan Younes','active'=>true]);
        // City::create(['name'=>'Dair Al Balah','active'=>true]);
        // City::create(['name'=>'Beit Lahia','active'=>true]);
        // City::create(['name'=>'Nuseirat','active'=>true]);
        // City::create(['name'=>'Egypt','active'=>true]);
        // City::create(['name'=>'Iraq','active'=>true]);

    }
}

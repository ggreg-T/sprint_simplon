<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class trekk extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('fr_FR');

        $coordyStart= $faker->latitude($min = -21.3791, $max = -20.8765);
        $coordxStart= $faker->longitude($min=55.2280, $max=55.8207);

        $coordyEnd= $faker->latitude($min=-21.3791, $max=-20.8765);
        $coordxEnd= $faker->longitude($min=55.2280, $max=55.8207);
      
        $coordCircuit= ($coordxStart.",".$coordyStart.";".$coordxEnd.",".$coordyEnd);
  
        for ($i = 0; $i < 5; $i++){
            DB::table('trecks')->insert([
            'idUser' => '0',
            'treckName' => $faker->name,
            'pseudo'=> $faker->word,
            'hardness'=> $faker->randomElement(["⭐","⭐⭐", "⭐⭐⭐", "⭐⭐⭐⭐", "⭐⭐⭐⭐⭐"]),
            'time'=> $faker->numberBetween(30, 500),
            'type'=> $faker->randomElement(["one way","round", "go & back"]),
            'distance'=> $faker->numberBetween(1, 10),
            'location'=> $faker->randomElement(["North","East", "South", "West"]),

            'coords'=> $coordCircuit,
            'description'=> $faker->realText($maxNbChars = 100, $indexSize = 2),
            'profil'=> 'walking',
            'private'=>$faker->randomElement(["0","1"]),
            ]);
            }
     }
}

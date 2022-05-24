<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Faker\Generator as Faker; 
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

        $coordxStart= $faker->numberBetween(55, -20);
        $coordyStart= $faker->numberBetween(55, -20);

        $coordxEnd= $faker->numberBetween(55, -20);
        $coordyEnd= $faker->numberBetween(55, -20);

        // $pointStart=array();
        // $pointEnd=array();
        // array_push($pointStart, strval($coordxStart), ",", strval($coordyStart));
        // array_push($pointEnd, strval($coordxEnd), ",", strval($coordyEnd));
 
        $coordCircuit= ($coordxStart.",".$coordxEnd.";".$coordyStart.",".$coordyEnd);
        // $coord= array();
        // array_push($coord, $pointStart, ";", $pointEnd);
        // dd($coord);

        // 'Latitude' => $faker->Address->latitude,
        // 'Longitude' => $faker->Address->longitude,
        for ($i = 0; $i < 2; $i++){
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
            // 'img'=> $faker->image(storage_path('images/treckingsecurLogo.png'),200,200, null, false),
            'private'=>$faker->randomElement(["0","1"]),
            ]);
            }
     }
}

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
            'coords'=> $faker->name,
            'description'=> $faker->realText($maxNbChars = 150, $indexSize = 2),
            'profil'=> 'walking',
            // 'profil'=> $faker->name,
            // 'img'=> $faker->image(storage_path('images/treckingsecurLogo.png'),200,200, null, false),
            'private'=>$faker->randomElement(["0","1"]),
            ]);
            }
     }
}

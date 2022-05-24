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
        // for ($i = 0; $i < 3; $i++){
        // foreach (range(1,3) as $value){
            DB::table('trecks')->insert([
            'idUser' => '0',
            'treckName' => $faker->name,
            'pseudo'=> $faker->name,
            'hardness'=> $faker->name,
            'time'=> $faker->numberBetween(30, 500),
            'type'=> $faker->name,
            'distance'=> $faker->numberBetween(1, 10),
            'location'=> $faker->name,
            'coords'=> $faker->name,
            'description'=> $faker->name,
            'profil'=> $faker->name,
            // 'img'=> $faker->image(storage_path('images/treckingsecurLogo.png'),200,200, null, false),
            'private'=>$faker->randomElement(["0","1"]),

            // #############################
            // 'treckName' => $faker->words,
            // 'pseudo'=>$faker->name,
            // 'hardness'=>$faker->name,
            // 'time'=>$faker->name,
            // 'type'=>$faker->name,
            // 'distance'=>$faker->name,
            // 'location'=>$faker->name,
            // 'coords'=>$faker->name,
            // 'description'=>$faker->name,
            // 'profil'=>$faker->name,
            // 'private'=>$faker->name,
            ]);
            // }
     }
}
// Schema::create('trecks', function (Blueprint $table) {
//     $table->id();
//     $table->string('treckName')->unique();
//     $table->bigInteger('idUser');
//     $table->string('pseudo');
//     $table->string('hardness')->nullable();
//     $table->string('time')->nullable();
//     $table->string('type');
//     $table->string('distance');
//     $table->string('location');
//     $table->text('coords');
//     $table->string('description');
//     $table->string('profil');
//     $table->string('img');
//     $table->boolean('private')->default(false);
//     $table->timestamps();

// exemple 1 et 2
 // $faker = Faker::create('fr_FR');
        // for ($i = 0; $i < 3; $i++){
        // foreach (range(1,3) as $value){
            // DB::table('trecks')->insert([
         
            // 'treckName' => $faker->words,
            // 'pseudo'=>$faker->name,
            // 'hardness'=>$this->$faker->words,
            // 'time'=>$faker->numberBetween(2, 200),
            // 'type'=>$this->$faker->words(2),
            // 'distance'=>$this->$faker->numberBetween(2, 20),
            // 'location'=>$this->$faker->words(2),
            // 'coords'=>$this->$faker->words(2),
            // 'description'=>$this->$faker->words(1),
            // 'profil'=>$this->$faker->words(1),
            // 'private'=>$this->$faker->number(0,1),
            // ]);
            // }
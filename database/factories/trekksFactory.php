<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class trekksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "treckName"=>$this->faker->words(2),
            "pseudo"=>$this->faker->name(),
            "hardness"=>$this->faker->words(),"time"=>$this->faker->words(2),
            "type"=>$this->faker->words(2),
            "distance"=>$this->faker->words(2),
            "location"=>$this->faker->words(2),
            "coords"=>$this->faker->words(2),
            "description"=>$this->faker->words(2),
            "profil"=>$this->faker->words(2),
            "private"=>$this->faker->words(2),

        ];
    }
}

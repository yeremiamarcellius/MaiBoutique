<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => "asdasd.jpg",
            'name' => $this->faker->unique()->firstName,
            'description' => $this->faker->text,
            'price' => $this->faker->randomNumber(4),
            'stock' => $this->faker->randomNumber(2),


        ];
    }
}

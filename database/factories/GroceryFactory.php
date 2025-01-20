<?php

namespace Database\Factories;

use App\Models\Grocery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroceryFactory extends Factory
{
    protected $model = Grocery::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),   // Generate a random word
            'quantity' => $this->faker->numberBetween(1, 100),   // Generate a random number between 1 and 100
            'price' => $this->faker->numberBetween(1, 100),   // Generate a random number between 1 and 100
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Categorie;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph,
            'date' => $this->faker->date,
            'localisation' => $this->faker->city,
            'user_id' => 4,
            'categorie_id' => 13,
            'number_of_seats' => $this->faker->numberBetween(50, 200),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

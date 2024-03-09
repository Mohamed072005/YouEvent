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
            'acceptation' => 0,
            'status' => 1,
            'categorie_id' => 13,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

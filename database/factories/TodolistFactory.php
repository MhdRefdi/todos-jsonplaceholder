<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodolistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'completed' => $this->faker->boolean
        ];
    }
}

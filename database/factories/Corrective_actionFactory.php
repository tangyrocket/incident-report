<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Corrective_action>
 */
class Corrective_actionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'description' => $this->faker->text(200),
            'lifting_period' => rand(1,3),
            'incident_id' =>rand(1,50),

        ];
    }
}
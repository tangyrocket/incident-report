<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incident_action>
 */
class Incident_actionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'state' => rand('si','no'),
            'action_id' => rand(1,2),
            'incident_id' => rand(1,50),
        ];
    }
}

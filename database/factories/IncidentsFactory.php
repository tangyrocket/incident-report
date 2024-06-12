<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incidents>
 */
class IncidentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $title = $this->faker->sentence(),
            'slug' => Str::slug($title),
            'description' => $this->faker->text(200),
            'activity' => $this->faker->sentence(),
            'location' => $this->faker->sentence(),
            'reported_user' => rand(1,5),
            'registered_user' => rand(1,5),
            'company_id' => rand(1,4),
            'bussiness_unit_id' => rand(1,2),
            'electrical_service_id' => rand(1,2),
            'area_id' => rand(1,4),
            'event_id' => rand(1,20),
            'incident_state_id' => rand(1,3),

        ];
    }
}

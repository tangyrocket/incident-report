<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [


            'url' => $this->faker->imageUrl( 640, 480, 'cats', true, 'Faker'),
            'type_image_id' => rand(1,2),
            'incident_id' => rand(1,50),

        ];
    }
}

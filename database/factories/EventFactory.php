<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug'       => fake()->slug(2),
            'attributes' => [
                'title'    => fake()->text(40),
                'excerpt'  => fake()->text(200),
                'text'     => fake()->text(800),
                'location' => fake()->address(),
            ],
            'starts_at' => fake()->dateTimeBetween('-4 months', '+4 months'),
            'ends_at'   => fake()->boolean() ? fake()->dateTimeBetween('-4 months', '+4 months') : null,
        ];
    }
}

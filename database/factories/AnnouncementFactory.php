<?php

namespace Database\Factories;

use App\Models\DistrictAssociation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $feature = fake()->boolean();

        return [
            'slug'       => fake()->slug(2),
            'attributes' => [
                'title'     => fake()->text(40),
                'sub_title' => fake()->text(40),
                'excerpt'   => fake()->text(200),
                'text'      => fake()->text(800),
            ],
            'author_id'               => User::inRandomOrder()->first()->id,
            'publish_at'              => fake()->dateTimeBetween('-4 weeks', '+1 week'),
            'unpublish_at'            => fake()->boolean(30) ? fake()->dateTimeBetween('-1 weeks', '+4 week') : null,
            'feature_until'           => $feature ? fake()->dateTimeBetween('-1 weeks', '+4 week') : null,
            'is_pinned'               => $feature ? fake()->boolean(10) : false,
        ];
    }
}

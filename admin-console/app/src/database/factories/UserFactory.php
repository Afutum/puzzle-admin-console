<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;

    public function definition(): array
    {
        $scheduled = $this->faker->dateTimeBetween('+1day', '+1year');
        return [
            'name' => $this->faker->unique()->name(),
            'raid_points' => $this->faker->randomNumber(5, 5),
            'created_at' => $scheduled->format('Y-m-d H:i:s'),
            'updated_at' => $scheduled->modify('+1year')->format('Y-m-d H:i:s'),
        ];
    }
}

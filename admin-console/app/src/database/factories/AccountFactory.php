<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition(): array
    {
        $scheduled = $this->faker->dateTimeBetween('+1day', '+1year');
        return [
            'name' => $this->faker->unique()->name(),
            'password' => Hash::make($this->faker->unique()->name()),
            'created_at' => $scheduled->format('Y-m-d H:i:s'),
            'updated_at' => $scheduled->modify('+1year')->format('Y-m-d H:i:s'),
        ];
    }
}

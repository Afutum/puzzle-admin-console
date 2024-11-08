<?php

namespace Database\Seeders;

use App\Models\RaidBoss;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RaidBossSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RaidBoss::create([
            'name' => 'slime',
            'hp' => 100000,
        ]);

        RaidBoss::create([
            'name' => 'mushroom',
            'hp' => 100000,
        ]);

        RaidBoss::create([
            'name' => 'cactus',
            'hp' => 120000,
        ]);

        RaidBoss::create([
            'name' => 'turtle',
            'hp' => 150000,
        ]);

        RaidBoss::factory(100)->create();
    }
}

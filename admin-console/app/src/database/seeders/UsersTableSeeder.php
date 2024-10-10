<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'jobi',
            'raid_points' => 300,

        ]);

        User::create([
            'name' => 'chiba',
            'raid_points' => 50,
        ]);

        User::create([
            'name' => 'hoge',
            'raid_points' => 0
        ]);

        User::factory(100)->create();
    }
}

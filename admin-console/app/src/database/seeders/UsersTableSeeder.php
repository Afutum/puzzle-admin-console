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
            'level' => 10,
            'xp' => 100,
            'life' => 3
        ]);

        User::create([
            'name' => 'chiba',
            'level' => 33,
            'xp' => 3830,
            'life' => 0
        ]);

        User::create([
            'name' => 'hoge',
            'level' => 8,
            'xp' => 63,
            'life' => 5
        ]);

        User::factory(100)->create();
    }
}

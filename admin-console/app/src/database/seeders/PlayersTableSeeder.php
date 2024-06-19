<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::create([
            'name' => 'jobi',
            'level' => 10,
            'xp' => 100,
            'life' => 3
        ]);

        Player::create([
            'name' => 'chiba',
            'level' => 33,
            'xp' => 3830,
            'life' => 0
        ]);

        Player::create([
            'name' => 'hoge',
            'level' => 8,
            'xp' => 63,
            'life' => 5
        ]);
    }
}

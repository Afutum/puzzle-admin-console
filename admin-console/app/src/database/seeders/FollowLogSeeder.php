<?php

namespace Database\Seeders;

use App\Models\followList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        followList::create([
            'user_id' => 2,
            'target_user_id' => 3,
        ]);
    }
}

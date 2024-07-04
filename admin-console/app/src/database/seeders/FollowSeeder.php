<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\followList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FollowSeeder extends Seeder
{
    public function run(): void
    {
        followList::create([
            'user_id' => 2,
            'follow_user_id' => 3,
        ]);
    }
}

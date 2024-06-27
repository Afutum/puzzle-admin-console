<?php

namespace Database\Seeders;

use App\Models\PersonalItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersonalItem::create([
            'User_id' => 1,
            'Item_id' => 1,
            'personal_item' => 15,
        ]);

        PersonalItem::create([
            'User_id' => 1,
            'Item_id' => 2,
            'personal_item' => 4,
        ]);

        PersonalItem::create([
            'User_id' => 2,
            'Item_id' => 1,
            'personal_item' => 4,
        ]);

        PersonalItem::create([
            'User_id' => 2,
            'Item_id' => 2,
            'personal_item' => 5,
        ]);

        PersonalItem::create([
            'User_id' => 2,
            'Item_id' => 3,
            'personal_item' => 1,
        ]);

        PersonalItem::create([
            'User_id' => 3,
            'Item_id' => 1,
            'personal_item' => 10,
        ]);

        PersonalItem::create([
            'User_id' => 3,
            'Item_id' => 2,
            'personal_item' => 4,
        ]);

        PersonalItem::create([
            'User_id' => 3,
            'Item_id' => 4,
            'personal_item' => 2,
        ]);
    }
}

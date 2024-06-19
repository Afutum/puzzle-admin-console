<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'item_name' => '回復薬',
            'type' => '消耗品',
            'effect_num' => 3,
            'explanation' => 'ライフが回復する'
        ]);

        Item::create([
            'item_name' => '超回復薬',
            'type' => '消耗品',
            'effect_num' => 5,
            'explanation' => 'ライフが超回復する'
        ]);

        Item::create([
            'item_name' => '復活の羽',
            'type' => '消耗品',
            'effect_num' => 1,
            'explanation' => '1度死んでも復活する'
        ]);

        Item::create([
            'item_name' => 'しあわせの靴',
            'type' => '装備品',
            'effect_num' => 10,
            'explanation' => 'クリア毎に経験値が加算'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\RaidResource;
use App\Models\Raid;
use App\Models\RaidBoss;
use Illuminate\Http\Request;

class RaidController extends Controller
{
    public function showRaidBoss()
    {
        $raid = Raid::select([
            'raids.id as id',
            'raids.boss_id',
            'raid_bosses.name',
            'raid_bosses.hp as maxHp',
            'raids.boss_hp as nowHp',
            'raids.updated_at'
        ])
            ->join('raid_bosses', 'raid_bosses.id', '=', 'raids.boss_id')
            ->orderByDesc('raids.updated_at')
            ->limit(1)
            ->get();

        return response()->json($raid);
    }

    public function raidBossHpUpdate(Request $request)
    {
        $raid = Raid::findOrFail($request->id);

        $raid->boss_hp -= $request->damage;
        $raid->user_id = $request->user_id;
        $raid->save();

        if ($raid->boss_hp <= 0) {
            switch (rand(1, 4)) {
                case 1:
                case 2:
                    Raid::create([
                        'user_id' => 0,
                        'boss_id' => $request->boss_id,
                        'boss_hp' => 1000
                    ]);
                    break;

                case 3:
                    Raid::create([
                        'user_id' => 0,
                        'boss_id' => $request->boss_id,
                        'boss_hp' => 1200
                    ]);
                    break;

                case 4:
                    Raid::create([
                        'user_id' => 0,
                        'boss_id' => $request->boss_id,
                        'boss_hp' => 1500
                    ]);
                    break;
            }
        }

        return response()->json(RaidResource::make($raid));
    }
}

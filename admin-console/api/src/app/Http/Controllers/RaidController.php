<?php

namespace App\Http\Controllers;

use App\Http\Resources\RaidResource;
use App\Models\Raid;
use Illuminate\Http\Request;

class RaidController extends Controller
{
    public function showRaidBoss()
    {
        $raid = Raid::select([
            'raids.id as id',
            'raid_bosses.name',
            'raid_bosses.hp as maxHp',
            'raids.boss_hp as nowHp',
            'raids.updated_at'
        ])
            ->join('raid_bosses', 'raid_bosses.id', '=', 'raids.boss_id')
            ->orderByDesc('raids.updated_at')
            ->limit(2)
            ->get();

        return response()->json($raid);
    }

    public function raidBossUpdate(Request $request)
    {
        $raid = Raid::findOrFail($request->id);

        $raid->boss_hp = $request->boss_hp;
        $raid->save();

        return response()->json($raid);
    }
}

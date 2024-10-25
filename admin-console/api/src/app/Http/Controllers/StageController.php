<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserStageResource;
use App\Models\Stage;
use App\Models\UserStage;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function index(Request $request)
    {
        $stage = Stage::All();
        return response()->json($stage);
    }

    public function showStage(Request $request)
    {
        $stages = UserStage::All()->where('user_id', '=', $request->user_id);
        return response()->json(UserStageResource::collection($stages));
    }

    public function store(Request $request)
    {
        $stage = UserStage::all()->where('user_id', '=', $request->user_id)
            ->where('stage_id', '=', $request->stage_id)->first();

        if ($stage == null) {
            UserStage::create([
                'stage_id' => $request->stage_id,
                'user_id' => $request->user_id,
                'clear_count' => 1,
                'fastest_time' => $request->fastest_time
            ]);
        } else {
            $stage->clear_count += 1;
            if ($stage->fastest_time > $request->fastest_time) {
                $stage->fastest_time = $request->fastest_time;
            }

            $stage->save();
        }

        return response()->json();
    }
}

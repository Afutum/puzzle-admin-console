<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserStageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'stage_id' => $this->stage_id,
            'clear_count' => $this->clear_count,
            'fastest_time' => $this->fastest_time,
            'created_at' => $this->created_at->format('Y/m/d H:i:s')
        ];
    }
}

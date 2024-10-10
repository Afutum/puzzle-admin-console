<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RaidResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'boss_id' => $this->boss_id,
            'boss_hp' => $this->boss_hp,
            'created_at' => $this->created_at->format('Y/m/d H:i:s')
        ];
    }
}

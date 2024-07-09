<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'item_name' => $this->item_name,
            'type' => $this->type,
            'effect_num' => $this->effect_num,
            'explanation' => $this->explanation,
            'created_at' => $this->created_at->format('Y/m/d H:i:s')
        ];
    }
}

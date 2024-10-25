<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MailResource extends JsonResource
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
            'text' => $this->text,
            'item_id' => $this->item_id,
            'item_cnt' => $this->item_cnt,
            'created_at' => $this->created_at->format('Y/m/d H:i:s')
        ];
    }
}

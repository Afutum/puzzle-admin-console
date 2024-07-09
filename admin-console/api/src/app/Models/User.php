<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany(item::class, 'personal_items', 'user_id', 'item_id')
            ->withPivot('personal_item');
    }

    protected $guarded = [
        'id',
    ];
}

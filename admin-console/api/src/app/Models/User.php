<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;

    public function items()
    {
        return $this->belongsToMany(item::class, 'personal_items', 'user_id', 'item_id')
            ->withPivot('personal_item');
    }

    protected $guarded = [
        'id',
    ];
}

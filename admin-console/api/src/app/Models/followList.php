<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class followList extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function followUser()
    {
        return $this->hasOne(User::class, 'id', 'follow_user_id');
    }

    protected $guarded = [
        'id',
    ];
}

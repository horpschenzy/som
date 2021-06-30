<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function member()
    {
        return $this->hasOneThrough(Member::class,User::class,'id', 'id');
    }
}

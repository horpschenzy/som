<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationAssignment extends Model
{
    public function members()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}

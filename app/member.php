<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['firstname', 'surname', 'othername', 'phonenumber', 'address', 'marital_status', 'gender', 'is_born_again', 'born_again_time', 'is_spirit_filled', 'current_church', 'reason', 'expectation'];
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeRegion($query, $region)
    {
        if ($region) {
           return $query->whereRegion($region);
        }
        return $query;
    }
}

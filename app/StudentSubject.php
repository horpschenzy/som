<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    protected $guarded = [];

    /**
     * Get the elective associated with the StudentSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function elective()
    {
        return $this->hasOne(Elective::class, 'id', 'elective_id');
    }
}

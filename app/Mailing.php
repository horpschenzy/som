<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Mailing extends Model
{
    protected $guarded = [];

    public function canSendMail()
    {
        return $this->whereDate('date', '=', Carbon::today()->toDateString())->first();
    }
}

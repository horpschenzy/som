<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Interfaces\UserTypes;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function member()
    {
        return $this->hasOne(Member::class,'user_id','id');
    }

    public function exam()
    {
        return $this->hasOne(Exam::class, 'reg_no', 'reg_no');
    }

    public function isAdmin(){
        return $this->user_type == UserTypes::ADMIN;
    }

    public function isSupervisor(){
        return $this->user_type == UserTypes::SUPERVISOR;
    }


    public function isStudent(){
        return $this->user_type == UserTypes::STUDENT;
    }

    public function payments()
    {
        return $this->hasMany(Payment::class,'user_id','id');
    }
    public function electives()
    {
        return $this->hasMany(StudentSubject::class,'user_id','id')->with('elective');
    }
}

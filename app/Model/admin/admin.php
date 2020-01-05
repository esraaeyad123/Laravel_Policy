<?php

namespace App\Model\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use Notifiable;




    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
    protected $fillable = [
        'name', 'email', 'password','status','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){

        return $this->belongsToMany('App\Model\admin\role');

}

}

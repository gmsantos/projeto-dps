<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts()
    {
        return $this->hasMany(SocialLoginAccount::class);
    }

    public function institution()
    {
        return $this->hasOne(Institution::class);
    }

    public function volunteer()
    {
        return $this->hasOne(Volunteer::class);
    }

    public function isAdmin()
    {
        return 'admin' === $this->role;
    }
}

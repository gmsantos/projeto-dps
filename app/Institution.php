<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['address', 'city'];
    
    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $fillable = ['phone'];
    
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
    
    public function causes()
    {
        return $this->belongsToMany(Cause::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getCausesListAttribute()
    {
        return $this->causes->pluck('id')->toArray();
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }

    public function getEmailAttribute()
    {
        return $this->user->email;
    }
}

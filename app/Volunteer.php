<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $fillable = ['name', 'phone', 'email'];
    
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
    
    public function causes()
    {
        return $this->belongsToMany(Cause::class);
    }
    
    public function getCausesListAttribute()
    {
        return $this->causes->pluck('id')->toArray();
    }
}

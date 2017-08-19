<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    protected $fillable = ['cause', 'user_id'];
    
    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class);
    }
}

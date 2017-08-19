<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['name', 'address', 'city'];
    
    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }
}

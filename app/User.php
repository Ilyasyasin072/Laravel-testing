<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $appends = ['fullname'];
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }
}

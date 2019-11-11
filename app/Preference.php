<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $fillabel = ['user_id', 'country', 'currency', 'subscribe_mailing'];

    public function user()
    {
        return $this->belongTo('App\User');
    }

    public function getResult()
    {
        return $this->query->first();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLog extends Model
{
    protected $fillable = ['product_id', 'changes'];

    public function setChangesAttribute($value)
    {
        $this->attributes['changes'] = json_encode($value);
    }

    public function getChangesAttribute($value)
    {
        return json_decode($value);
    }
}

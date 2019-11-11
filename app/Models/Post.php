<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //use \App\Scope\PublishedTrait;
    use \App\Scope\Published;

    protected $fillabel = ['title', 'content', 'published'];

    public function getDates()
    {
        return ['created_at', 'updated_at', 'viewed_at'];
    }
}

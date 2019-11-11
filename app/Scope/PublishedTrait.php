<?php namespace App\Scope;

trait PublishedTrait {
    public function scopePublished($query)
    {
        return $query->where('published',1);
    }

    public function scopeDraft($query)
    {
        return $query->where('published', '!=' ,1);
    }
}
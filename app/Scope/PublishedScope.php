<?php namespace App\Scope;
use Illuminate\Database\Eloquent\ScopeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PublishedScope implements ScopeInterface
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('published', 1);
    }

    public function remote(Builder $builder, Model $model)
    {
        $query = $builder->getQuery();

        foreach((array) $query->wheres as $key => $where)
        {
            //mengecheck opsi constraint untuk published
            if($where['type'] == 'Basic' && $where['column'] == 'published')
            {
                unset($query->wheres[$key]);
                $query->wheres = array_values($query->wheres);
                $bindings = $query->getRawBindings()['where'];
                unset($bindings[$key]);
                $query->setBindings($bindings);
            }
        }

        return $query;
    }
}
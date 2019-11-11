<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
   use \App\Scope\PublishedTrait;
   //use SoftDeletes;
   //protected $dates = ['deleted_at'];

   protected $casts = [
      'price' => 'double',
   ];

   public function scopeOverstock($query)
   {
      return $query->where('stock', '<', 10);
   }

   public function scopeLevel($query, $parameter)
   {
      switch($parameter)
      {
         case 'lux':
            return $query->where('price', '>', 50000000);
            break;
         case 'mid':
            return $query->whereBetween('price',[3000000, 5000000]);
            break;
         case 'entry':
            return $query->where('price', '<', 30000000);
            break;
         default:
         return $query;
         break;
      }
   }
}

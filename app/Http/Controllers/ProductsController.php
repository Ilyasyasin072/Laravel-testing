<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use DateTime;
use Exception;
use Cache;

class ProductsController extends Controller
{
    public function connectionwithcache()
    {
    	DB::connection()->enableQueryLog();

    	$products = Cache::remember('product.lowest-price', 1, function()
    	{
    		return DB::table('products')->where('price', DB::table('products')->min('price'))->get();
    	});
    	dd($products);

    	dd(DB::getQueryLog());
    }

    public function cachewithupdate()
    {
    	DB::connection()->enableQueryLog();
    	DB::table('products')->where('id', 4871)->update([
    		'price' => 1000000
    	]);
    	Cache::forget('product.lowest-price');
    }
}

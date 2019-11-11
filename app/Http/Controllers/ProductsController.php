<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Product;
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
    		return Product::where('price', DB::table('products')->min('price'))->get();
    	});
    	dd($products);

    	dd(DB::getQueryLog());
    }

    public function cachewithupdate()
    {
    	DB::connection()->enableQueryLog();
    	Product::where('id', 4871)->update([
    		'price' => 1000000
    	]);
    	Cache::forget('product.lowest-price');
	}
	
	public function index()
	{
		$app = Product::find(1);
		return $app;
	}
}

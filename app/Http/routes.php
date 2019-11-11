<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list-stock', function(){
	$begin = memory_get_usage();
	foreach (DB::table('products')->get() as $product) {
		if($product->stock > 20) {
			echo $product->name . ':' . $product->stock . '</br>';
		}
	}
	echo 'total memory usage :'  . (memory_get_usage() - $begin);
});

Route::get('/list-stock-chunk', function(){
	$begin = memory_get_usage();
	DB::table('products')->chunk(100, function($product)
	{
		foreach($product as $product)	
		{
			if($product->stock > 20) {
				echo $product->name . ':' . $product->stock . '<br>';
			}
		}
	});
	echo 'total memoru usege' . (memory_get_usage() - $begin);
});

// Route::get('/order-product', function(){
// 	DB::transaction(function()
// {
// 	//membuat record di table order
// 	$order_id = DB::table('orders')->insertGetId(['customer_id'=>1]);

// 	//menambahkan record baru di order_producs
// 	DB::table('orders_products')->insert(['order_id' => $order_id, 'product_id' => 5]);
// 	//membayar order (mengisi filed 'paid_at' di table orders)

// 	DB::table('orders')->where('id' , $order_id)->update(['paid_at' => new DateTime]);

// 	throw new Exception("Opppsss ada error!");
   
// 	DB::table('products')->decrement('stock');
// });

// 	echo "Berhasil menjual" . DB::table('products')->find(5)->name . '</br>';
// 	echo "stock terkini" . '</br>'  . DB::table('products')->find(5)->stock;
// });

Route::get('/order-product', 'OrderTransactionController@triggerTransaction');
Route::get('/order-product-new', 'OrderTransactionController@beginTransaction');
Route::get('connectionCustomer','CustomersController@connection');
Route::get('customer/{id}','CustomersController@findbyId');
Route::get('connectionProduct', 'ProductsController@connectionwithcache');
Route::get('cachewithupdate', 'ProductsController@cachewithupdate');
Route::get('product','ProductsController@index');
Route::get('post','PostsController@scopGlobal');

Route::get('/product/{product}', function($product){
	return $product;
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use DateTime;
use Exception;

class OrderTransactionController extends Controller
{
    public function triggerTransaction() {
    		    DB::transaction(function()
		{
			//membuat record di table order
			$order_id = DB::table('orders')->insertGetId(['customer_id'=>1]);

			//menambahkan record baru di order_producs
			DB::table('orders_products')->insert(['order_id' => $order_id, 'product_id' => 5]);
			//membayar order (mengisi filed 'paid_at' di table orders)

			DB::table('orders')->where('id' , $order_id)->update(['paid_at' => new DateTime]);

			throw new Exception("Opppsss ada error!");
		   
			DB::table('products')->decrement('stock');
		});

			echo "Berhasil menjual" . DB::table('products')->find(5)->name . '</br>';
			echo "stock terkini" . '</br>'  . DB::table('products')->find(5)->stock;
    }

    public function beginTransaction()
    {
    	//Mulai Transaksi
    	DB::beginTransaction();

    	try {
    		//Membuat record di table 'orders'
    		$order_id = DB::table('orders')->insertGetId(['customer_id' => 1]);
    		// Menambah record baru du order_products
    		DB::table('orders_products')->insert([
    			'order_id' => $order_id, 'product_id' => 5]);
    		//jika menambahkan Exeption di sini maka eksekusi akan tetap terkomit tetapi tidak akan mengurangi stock
    		// throw new Exception("Koneksi Terputus Database");
    	} catch (Exception $e) {
    		DB::commit();
    		return "Error: " .$e->getMessage();
    	}

    	try {
    		//membayar order (mengisi field paid_at di table orders)

    		DB::table('orders')->where('id', $order_id)->insert(['paid_at' => new DateTime]);
   //jika menambahkan Exception nya disini maka semua yang insert ke semua akan di rollback atau tidak di eksekusi
    	throw new Exception("Server Database Mati");
    		DB::table('products')->decrement('stock');

    	} catch (Exception $e) {
    		DB::rollback();
    		return "Error:" . $e->getMessage();
    	}

    	DB::commit();
    	echo "Berhasil menjual" . DB::table('products')->find(5)->name . '</br>';
			echo "stock terkini" . '</br>'  . DB::table('products')->find(5)->stock;
    }
}

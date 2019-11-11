<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Customer;
use App\Models\Product;
use DB;
use DateTime;
use Exception;

class CustomersController extends Controller
{
    public function connection()
    {
    	DB::connection()->enableQueryLog();
    	$products = DB::table('products')->get();
    	$products = DB::table('customers')->whereIn('id' , [1,4,5])->select([
    		'name', 'phone'
    	])->get();
    	$customers = DB::table('customers')->leftJoin('membership_types','customers.membership_type_id','=','membership_types.id')->get();

    	dd(DB::getQueryLog());
	}
	
	public function findbyId($id)
	{
		try
		{
			$customers = Customer::findOrFail($id);
			return $customers;
		} catch (Exception $e) {
			return "Mohon Maaf Data Tidak ada";
		}
	}
}

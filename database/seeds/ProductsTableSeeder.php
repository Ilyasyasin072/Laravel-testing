<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into products 
        	name, 
        	description,
        	price,
        	stock) values (:name, :description, :price, :stock)',
        	[
        		'name' => 'mobil mobilan',
        		'description' => 'mobil moge',
        		'price' => 100,
        		'stock' => 1
        	]);


                DB::insert('insert into products 
        	name, 
        	description,
        	price,
        	stock) values (:name, :description, :price, :stock)',
        	[
        		'name' => 'mobil1',
        		'description' => 'mobil moge1',
        		'price' => 101,
        		'stock' => 1
        	]);
    }
}

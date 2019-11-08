<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();
       $membership_type_id = [null, 1,2];

       foreach(range(1,10) as $index)
       {
       	DB::table('customers')->insert(
       		[
       			'name' => $faker->name,
       			'phone' => $faker->phoneNumber,
       			'address' => $faker->address,
       			'membership_type_id' => $membership_type_id[rand(0,3)]

       		]);
       }
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0; $i < 10; $i++)
        {
            App\Models\Post::insert(
                [
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
                'published' => rand(0,1)
                ]
                );
        }
    }
}

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
            // App\Models\Post::insert(
            //     [
            //     'title' => $faker->sentence,
            //     'content' => $faker->paragraph,
            //     'published' => rand(0,1),
            //     'viewed_at' => Carbon\Carbon::now()
            //                     ->addDays(rand(1,5))
            //                     ->addHours(rand(0,18));
            //     ]
            //     );
        $post = new App\Models\Post;
        $post->title = $faker->sentence;
        $post->content = $faker->paragraph;
        $post->published = rand(0,1);
        $post->viewed_at = Carbon\Carbon::now()->addDays(rand(1,5))->addHours(rand(0,18));
        $post->save();
        }
    }
}

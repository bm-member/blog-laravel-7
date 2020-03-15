<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for ($i=0; $i < 20; $i++) { 
            $post = new Post();
            $post->title = $faker->text('10');
            $post->content = $faker->text('1000');
            $post->user_id = rand(1, 3);
            $post->save();
        }
    }
}

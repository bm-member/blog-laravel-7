<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(PostSeeder::class);
        factory(App\Category::class, 5)->create()->each(function($category) {
            $category->posts()->saveMany(factory(App\Post::class, rand(1, 10))->make());
        });
        
    }
}

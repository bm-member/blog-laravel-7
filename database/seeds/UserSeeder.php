<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('password'); // password
        $user->save();
        $user->assignRole('admin');

        $user = new User();
        $user->name = 'Author';
        $user->email = 'author@author.com';
        $user->password = bcrypt('password'); // password
        $user->save();
        $user->assignRole('author');

        $user = new User();
        $user->name = 'Normal User';
        $user->email = 'user@user.com';
        $user->password = bcrypt('password'); // password
        $user->save();
        $user->assignRole('user');

        // factory(App\User::class, 10)->create()->each(function ($user) {
        //     $user->assignRole('user');
        //     $user->posts()->saveMany(factory(App\Post::class, 2)->make());
        // });
    }
}

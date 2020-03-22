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
        $faker = Faker\Factory::create();
        $users = [
            ['email' => 'mgmg@bm.com', 'role' => 'admin'],
            ['email' => 'agag@bm.com', 'role' => 'author'],
            ['email' => 'tuntun@bm.com', 'role' => 'guest'],
        ];

        foreach($users as $u) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = $u['email'];
            $user->email_verified_at = now();
            $user->password = bcrypt('password'); // password
            $user->role = $u['role'];
            $user->save();
        }
    }
}

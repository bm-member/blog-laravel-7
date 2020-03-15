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

        for ($i = 0; $i < 3; $i++) {
            $user = new User();
            $user->name = $faker->name;
            $user->email = "mgmg$i@bm.com";
            $user->email_verified_at = now();
            $user->password = bcrypt('password'); // password
            $user->save();
        }
    }
}

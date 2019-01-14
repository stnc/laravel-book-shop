<?php

use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('user_detail')->insert([
            'user_id' => 1,
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'website' => $faker->url,
        ]);


        DB::table('user_detail')->insert([
            'user_id' => 2,
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'website' => $faker->url,
        ]);

        DB::table('user_detail')->insert([
            'user_id' => 3,
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'website' => $faker->url,
        ]);

        DB::table('user_detail')->insert([
            'user_id' => 5,
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'website' => $faker->url,
        ]);
        DB::table('user_detail')->insert([
            'user_id' => 6,
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'website' => $faker->url,
        ]);
        DB::table('user_detail')->insert([
            'user_id' => 7,
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'website' => $faker->url,
        ]);
        DB::table('user_detail')->insert([
            'user_id' => 8,
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'website' => $faker->url,
        ]);
        DB::table('user_detail')->insert([
            'user_id' => 9,
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'website' => $faker->url,
        ]);
        DB::table('user_detail')->insert([
            'user_id' => 10,
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'website' => $faker->url,
        ]);

    }
}

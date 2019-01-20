<?php

use Illuminate\Database\Seeder;

class UserDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 10)->create()->each(function ($users) {
            // Seed the relation with 5 userdetal
                $UserDetail = factory(App\Models\UserDetail::class, 1)->make();
                $users->usersDetail()->saveMany($UserDetail);
            });
    }
}

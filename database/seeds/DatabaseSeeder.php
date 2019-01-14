<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserDetailSeeder::class);
       // $this->call(UsersTableSeeder::class);

    }
}

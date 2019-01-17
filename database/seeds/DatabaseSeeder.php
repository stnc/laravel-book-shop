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
       Eloquent::unguard();

       // Ask for db migration refresh, default is no
       if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {

           // Call the php artisan migrate:fresh using Artisan
          // $this->command->call('migrate:fresh');

           $this->command->line("Database cleared.");
       }

       $this->call(AuthorTableSeeder::class);


       factory(App\Models\User::class, 10)->create()->each(function ($users) {
        // Seed the relation with 5 userdetal
        $UserDetail = factory(App\Models\UserDetail::class, 1)->make();
        $users->usersDetail()->saveMany($UserDetail);
    });


       $this->command->info("Database seeded.");


       // Re Guard model
       Eloquent::reguard();
    }
}

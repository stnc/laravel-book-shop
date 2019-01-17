<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // How many authors you need, defaulting to 10
        $count = (int)$this->command->ask('How many author do you need ?', 10);

        $this->command->info("Creating {$count} authors.");

        // Create the Genre
        $authors= factory(App\Models\A_authors::class, $count)->create();

        $this->command->info('Authors Created!');
    }
}

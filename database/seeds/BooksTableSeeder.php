<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = (int)$this->command->ask('How many book do you need ?', 10);

        $this->command->info("Creating {$count} books.");

        // Create the Genre
        $dump= factory(App\Models\A_books::class, $count)->create();

        $this->command->info('bokks Created!');
    }
}

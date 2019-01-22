<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class BookAuthorRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $faker = Faker::create();

        $count = (int)$this->command->ask('How many book-author do you need ?', 10);

        $this->command->info("Creating {$count} books-author.");

        for ($i=0;$i<$count;$i++){
            DB::table('book_author_relations')->insert(
                [
                    'author_id' => factory(\App\Models\A_authors::class)->create()->id,
                    'book_id' => factory(\App\Models\A_books::class)->create()->id,
                    'created_at'  => $faker->dateTimeInInterval('-7 days'),
                    'updated_at'  => $faker->dateTimeInInterval('-7 days'),
                ]
            );
        }

        $this->command->info('bokks and authors  Created!');
    }
}

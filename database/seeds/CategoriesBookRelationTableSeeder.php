<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CategoriesBookRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\A_books::class)->create()->each(function ($books) {
            $faker = Faker::create();
            DB::table('categories_book_relations')->insert([
                'category_id' => rand(1, 7),
                'book_id' => $books->id,
                'created_at'  => $faker->dateTimeInInterval('-7 days'),
                'updated_at'  => $faker->dateTimeInInterval('-7 days'),
            ]);
        });
    }
}

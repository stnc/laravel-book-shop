<?php

use Illuminate\Database\Seeder;

class CategoriesBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      

        DB::table('categories_book')->insert([
            'name' => 'Biography',
        ]);

        DB::table('categories_book')->insert([
            'name' => 'Business',
        ]);


        DB::table('categories_book')->insert([
            'name' => 'Education',
        ]);


        DB::table('categories_book')->insert([
            'name' => 'Kids',
        ]);


        DB::table('categories_book')->insert([
            'name' => 'Romance',
        ]);


        DB::table('categories_book')->insert([
            'name' => 'Social Sciences',
        ]);

        DB::table('categories_book')->insert([
            'name' => 'History',
        ]);

        DB::table('categories_book')->insert([
            'name' => 'Philosophy',
        ]);

    }
}

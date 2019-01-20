<?php

use Illuminate\Database\Seeder;

class BooksAuthorsLikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 //factory(App\Models\A_book_author_like::class, 'A_authors', 1)->create();

        factory(App\Models\A_authors::class)->create()->each(function ($authors) {
            DB::table('a_book_author_likes')->insert([
                'liketable_type' => 'authors',
                'liketable_id' => $authors->id
            ]);
        });


        factory(App\Models\A_books::class)->create()->each(function ($books) {
            DB::table('a_book_author_likes')->insert([
                'liketable_type' => 'books',
                'liketable_id' => $books->id
            ]);
        });

    }
}

<?php

use Illuminate\Database\Seeder;

class BookPuplisherRelationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        factory(App\Models\A_books::class)->create()->each(function ($books) {

            $idLast = DB::table('puplishing_house')->pluck('id')->last();
            $idfirst = DB::table('puplishing_house')->pluck('id')->first();
            $rnd=rand($idfirst, $idLast);

            DB::table('books_puplisher_relations')->insert([
                'puplisher_id' => $rnd,
                'book_id' => $books->id
            ]);
        });
    }
}

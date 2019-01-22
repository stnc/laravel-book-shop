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


        $idLast = DB::table('puplishing_house')->pluck('id')->last();
        $idfirst = DB::table('puplishing_house')->pluck('id')->first();
        $rnd=rand($idfirst, $idLast);

        factory(App\Models\A_books::class)->create()->each(function ($books) use  ($rnd){
            DB::table('books_puplisher_relations')->insert([
                'puplisher_id' => $rnd,
                'book_id' => $books->id
            ]);
        });
    }
}

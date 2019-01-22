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
            'name' => 'Edebiyat',
        ]);

        DB::table('categories_book')->insert([
            'name' => 'Eğlence-Mizah',
        ]);


        DB::table('categories_book')->insert([
            'name' => 'Ekonomi',
        ]);


        DB::table('categories_book')->insert([
            'name' => 'Felsefe-Düşünce',
        ]);

        DB::table('categories_book')->insert([
            'name' => 'Bilgisayar',
        ]);


        DB::table('categories_book')->insert([
            'name' => 'Bilim-Mühendislik',
        ]);


        DB::table('categories_book')->insert([
            'name' => 'Çocuk Kitapları',
        ]);


    }
}

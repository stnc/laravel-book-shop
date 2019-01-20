<?php

use Illuminate\Database\Seeder;
//use Faker\Generator as Faker;
use Faker\Factory as Faker;
class CommentsTableSeeder extends Seeder
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
            DB::table('comments')->insert([
                'commentable_type' => 'books',
                'commentable_id' => $books->id,
                'user_id' => 1,
                'comment_author' => $faker->name,
                'comment_author_url' => $faker->url,
                'comment_content' => $faker->text(50),
                'comment_approved' => 1,
            ]);

        });
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//https://www.easylaravelbook.com/blog/creating-a-hasmany-relation-in-laravel-5/
//https://itsolutionstuff.com/post/laravel-5-ajax-crud-with-pagination-example-and-demo-from-scratchexample.html   //ajax
//https://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers
//https://martinbean.co.uk/blog/2014/07/04/re-using-controllers-for-admin-and-non-admin-routes-in-laravel/
//https://itsolutionstuff.com/post/crud-create-read-update-delete-example-in-laravel-52-from-scratchexample.html

//https://tighten.co/blog/extending-models-in-eloquent
//morpmap kullanımı
//https://laracasts.com/discuss/channels/eloquent/using-morphmap-on-more-than-one-polymorphic-relationship

use App\Posts;
use App\PostsCategories;
use App\PostTags;
use App\PostsComments;
use App\Books;

Route::get('/', function () {
echo "
<a href='/author/add' > yazar ekle </a>
<br>
<a href='/author/15' > yazar git </a>
<br>
<a href='/books/15' > kitap git </a>


";
die;

   // $authors = App\A_authors::create(['name' => 'Selman tunç']);
    $books = App\A_books::create(['name' => ' gomülü şamdan ','author_id' => 15]);
    $upvote1 = new App\A_book_author_like;
    $upvote2 = new App\A_book_author_like;
    $upvote3 = new App\A_book_author_like;
    $books->likes()->save($upvote1);
//    $authors->likes()->save($upvote2);
    $books->likes()->save($upvote3);


die;



    $task = new App\Model\Posts;
    $task->post_title = 'ishak Walk the dog';
    $task->post_content = 'ishak Walk Barky the Mutt';
    $task->post_author = '1';
    $task->post_status = '1';
    $task->post_order = '1';
    $task->save();

    $category = new App\Model\Categories(['name' => 'ishak selman cat']);


    $tags = new App\Model\PostTags(['name' => 'ishak new tag']);
    // $Comments = new PostsComments(['comment_content' => 'yeni yorumum']);


    $task->categories()->save($category);
    // $task->Comments()->save($Comments);
    $task->tags()->save($tags);

    $list = App\Model\Posts::find(1);
    $categories = [
        new App\Model\Categories(['name' => 'Vacation']),
        new App\Model\Categories(['name' => 'Tropical']),
        new App\Model\Categories(['name' => 'Leisure']),
    ];

    $list->categories()->saveMany($categories);

    $list->categories()->attach([7, 6]);//kategoriye 7 ve 6 da bağlıyor
//    $list->categories()->attach(5);

});

Route::resource('companies', 'CompaniesController');



// admin routes http://www.w3programmers.com/laravel-route-groups/

//https://www.devproblems.com/laravel-5-admin-middleware-is_admin-user-check/  admin middware
Route::group(['middleware' => ['auth', 'admin'],'namespace' => 'Admin', 'prefix' => 'admin'], function () {


    //Route::resource('auth', 'AuthController');
 //  Route::auth();
    Route::resource('posts','PostsController');


});
/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


*/

Route::get('/author/add', 'AuthorsController@add')->name('author.show');
Route::get('/author/{authur}', 'AuthorsController@show')->name('author.show');
Route::get('/book/{bookID}', 'BooksController@show')->name('book.show');
Route::get('/puplisher/{puplish}', 'PuplisherController@show')->name('video.show');

//todo : comment kaldı sadece

Route::get('/tagekle', function () {


    $post = App\A_books::find(15);
    $tag = new App\Tag;
    $tag->name = "ItSolutionStuff.com book";
    $post->tags()->save($tag);

    $v = App\A_authors::find(15);
    $tag = new App\Tag;
    $tag->name = "ItSolutionStuff.com author";
    $v->tags()->save($tag);

die();
/*
    $post = App\A_books::find(15);
    $tag1 =     new App\Tag;
    $tag1->name = "ItSolutionStuff.com";
    $tag2 =   new App\Tag;
    $tag2->name = "ItSolutionStuff.com 2";
    $post->tags()->saveMany([$tag1, $tag2]);
*/


/*
    $post =App\A_books::find(15);
    $tag1 =  App\Tag::find(1);
    $tag2 =  App\Tag::find(2);
    $post->tags()->attach([$tag1->id, $tag2->id]);
*/

    $post = App\A_books::find(15);
    $tag1 = App\Tag::find(1);
    $tag2 = App\Tag::find(2);
    $post->tags()->sync([$tag1->id, $tag2->id]);

});
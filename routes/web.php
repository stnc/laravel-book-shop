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


    $authors = App\A_authors::create(['name' => 'Free smoke']);
    $books = App\A_books::create(['name' => 'Selman tunç','author_id' => $authors->id]);
    $upvote1 = new App\A_book_author_like;
    $upvote2 = new App\A_book_author_like;
    $upvote3 = new App\A_book_author_like;
    $books->likes()->save($upvote1);
    $authors->likes()->save($upvote2);
    $books->likes()->save($upvote3);


    die();
    $album = App\Album::find(1);
    $upvotes = $album->upvotes;
     $upvotescount = $album->upvotes->count();



    die;
    $task = new Posts;
    $task->post_title = 'ishak Walk the dog';
    $task->post_content = 'ishak Walk Barky the Mutt';
    $task->post_author = '1';
    $task->post_status = '1';
    $task->post_order = '1';
    $task->save();

    $category = new PostsCategories(['name' => 'ishak selman cat']);


    $tags = new PostTags(['name' => 'ishak new tag']);
    // $Comments = new PostsComments(['comment_content' => 'yeni yorumum']);


    $task->categories()->save($category);
    // $task->Comments()->save($Comments);
    $task->tags()->save($tags);

    $list = Posts::find(1);
    $categories = [
        new PostsCategories(['name' => 'Vacation']),
        new PostsCategories(['name' => 'Tropical']),
        new PostsCategories(['name' => 'Leisure']),
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

Route::get('/author/add', 'AAuthorsController@add')->name('author.show');
Route::get('/author/{authur}', 'AAuthorsController@show')->name('author.show');
Route::get('/books/{book}', 'ABooksController@show')->name('video.show');
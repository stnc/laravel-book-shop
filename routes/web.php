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

Route::get('/','HomeController@index')->name('home');



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

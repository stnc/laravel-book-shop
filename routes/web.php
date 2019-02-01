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
//https://appdividend.com/2018/09/06/laravel-5-7-crud-example-tutorial/


///https://designrevision.com/demo/shards-dashboards/index.html


Route::get('/','HomeController@index')->name('home');



// backend routes http://www.w3programmers.com/laravel-route-groups/
/*
//https://www.devproblems.com/laravel-5-admin-middleware-is_admin-user-check/  backend middware
Route::group(['middleware' => ['auth', 'backend'],'namespace' => 'Admin', 'prefix' => 'backend'], function () {

    //Route::resource('auth', 'AuthController');
 //  Route::auth();
    Route::resource('posts','PostsController');

});*/


Route::resource('posts','PostsController');
Route::get('/author/add', 'AuthorsController@add')->name('author.add');
Route::get('/author/{authur}', 'AuthorsController@show')->name('author.show');
Route::get('/book/{bookID}', 'BooksController@show')->name('book.show');
Route::get('/puplisher/{puplish}', 'PuplisherController@show')->name('puplisher.show');
Route::get('/cat/{cat}', 'CategoryController@show')->name('category.show');



Route::get('contact', 'MailController@contact');
Route::post('contact/send', 'MailController@send');

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





// backend routes http://www.w3programmers.com/laravel-route-groups/



//Route::resource('posts','PostsController');
Route::get('/author/add', 'AuthorsController@add')->name('author.add');
Route::get('/author/{authur}', 'AuthorsController@show')->name('author.show');
Route::get('/book/{bookID}', 'BooksController@show')->name('book.show');
Route::get('/puplisher/{puplish}', 'PuplisherController@show')->name('puplisher.show');
Route::get('/cat/{cat}', 'CategoryController@show')->name('category.show');



Route::get('contact', 'MailController@contact');
Route::post('contact/send', 'MailController@send');



Route::get('/home', 'HomeController@index')->name('home');


/*
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('auth', 'AuthController');


    Route::group(['middleware' => ['admin_auth', \App\Http\Middleware\AdminShare::class]], function () {
        Route::any('dashboard/{sing_page?}', 'DashBoardController');
    });

                                                                                                       hhhhhhhhhhhhhhhhhhhh
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', 'AccountController@index');
        Route::put('/', 'AccountController@update');
        Route::delete('/comment/{comment}', 'AccountController@deleteMessage');
        Route::post('/mail-send/{user}', 'AccountController@mailSend');
        Route::post('/usercreate', 'AccountController@usercreate');
    });
});


*/

//https://stackoverflow.com/questions/50427439/larael-add-custom-middleware-to-route-group
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('home', 'HomeController@index');
    Route::resource('posts', 'PostsAdminController');
    Route::get('/', 'Auth\LoginController@showLoginForm');

    Route::group(['prefix' => 'account'], function () {
        Route::get('login', 'Auth\LoginController@showLoginForm');
        Route::post('login', 'Auth\LoginController@login')->name('admin.login');
        Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
        Route::get('register', 'Auth\RegisterController@showRegistrationForm');
        Route::post('register', 'Auth\RegisterController@register')->name('admin.register');
    });



});

Route::get('posts/getfaproduct', 'Admin\PostsAdminController@dtajax')->name('posts/getfaproduct');



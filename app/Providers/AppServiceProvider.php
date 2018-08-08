<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //https://josephsilber.com/posts/2018/07/02/eloquent-polymorphic-relations-morph-map
        //https://www.sitepoint.com/eloquents-polymorphic-relationships-explained/s
        Relation::morphMap([
            'books' => 'App\A_books',
            'authors' => 'App\A_authors',
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

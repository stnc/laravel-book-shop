<?php

namespace App\Http\Middleware;

use App\Language;
use Closure;

class AdminShare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        view()->share('languages',Language::all());
        return $next($request);
    }
}

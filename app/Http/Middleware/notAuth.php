<?php

namespace App\Http\Middleware;

use Closure;

class notAuth
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
        if (auth()->guard('admin')->check() && !$request->is('admin/auth/logout'))
            return redirect('admin/dashboard');


        return $next($request);
    }
}

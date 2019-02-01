<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Http\Request;

class isSiteLoggedCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {



        if (!auth()->check()) {
            return $this->cookieCreate($next, $request);
        }
        return $next($request);
    }

    private function cookieCreate($next, Request $request)
    {


        $guest_cookie=$request->cookie('guest_cookie');

        // eğer zaten hazır bir kullanıcı var ise ordan devam et
        if($guest_cookie!=null  )
        {
            $user=User::where([
                ['cookie','=',$guest_cookie],
                ['type','=','guest'],
            ])->first();

            if(!is_null($user))
            {
                auth()->loginUsingId($user->id,true);
                return $next($request)->withCookie(cookie()->forever('guest_cookie', $guest_cookie));
            }
        }





        $cookie = time() . rand(0, 999999);

        $email = time() . str_random(12) . "@fakemail.com";
        $user = User::create([
            'name' => 'laravel_guest',
            'surname' => 'laravel_guest',
            'phone' => '5444545454',
            'birth_date' => time(),
            'type' => 'guest',
            'email' => $email,
            'password' => bcrypt($email),
            'cookie' => $cookie,
            'ip' => $request->ip(),
        ]);

        auth()->attempt(['email' => $user->email, 'password' => $email], true);


        return $next($request)->withCookie(cookie()->forever('guest_cookie', $cookie));

    }


}

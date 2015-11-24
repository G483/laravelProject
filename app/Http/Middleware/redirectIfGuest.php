<?php

namespace App\Http\Middleware;

use Closure;

class redirectIfGuest
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

        // if($this->user->check()){

        //     return redirect('/auth/login');
        
        // }

        return $next($request);
    }
}

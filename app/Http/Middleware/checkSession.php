<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkSession
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
        $registerid=Session::get('registerid');
        if($registerid)
            return $next($request);
        else 
            return redirect('login');
    }
}

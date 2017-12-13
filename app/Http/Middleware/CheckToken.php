<?php

namespace App\Http\Middleware;
use App\User;
use Closure;

class CheckToken
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
        $token=$request->input('token');
        if($token)
        {
            $result=User::where('remember_token','=',$token);
            if($result->count())

                return $next($request);
            else
            { 
                $message="Invalid Token";
                $status_code=401; // Unauthorized
                return  response(['message'=>$message,'status_code'=>$status_code]);
            }
        }
        else
        {
            $message="Token Missing";
            $status_code=400; // Bad Request
            return  response(['message'=>$message,'status_code'=>$status_code]);
        }
    }
}

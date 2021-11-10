<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanBid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     protected $role1="s_privee";
     protected $role2="c_individuel";

    public function handle(Request $request, Closure $next)
    {

        if(!Auth::check())
        {
                return redirect('/');
        }
        else{
            if (!($request->user()->type==$role1) || !($request->user()->type==$role2)) {
       
                abort(403);
            }
        }
        return $next($request);
    }
}

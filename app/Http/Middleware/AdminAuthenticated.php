<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle(Request $request, Closure $next)
    {
        $role="admin";

        if(!Auth::check())
        {
                return redirect('/');
        }
        else{
            if (! ($request->user()->type==$role  )) {
       
                abort(403);
            }
        }

        return $next($request);
    }
}

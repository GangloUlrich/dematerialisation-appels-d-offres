<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanCreate
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

     $role1="c_individuel";
     $role2="admin";
    


        if(!Auth::check())
        {
                return redirect('/');
        }
        else{
            if ($request->user()->type==$role1) {
       
                abort(403);
            }

            if ($request->user()->type==$role2) {
       
                abort(403);
            }

         
        }
        return $next($request);
    }
}

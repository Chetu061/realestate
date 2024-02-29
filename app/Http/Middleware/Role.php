<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response //one more variable create $role
    {

        //code for do not give permission of one another dashboard
        if($request->user()->role!==$role)
        {
            return redirect('dashboard');
        }
        //end code
        return $next($request);
    }
}

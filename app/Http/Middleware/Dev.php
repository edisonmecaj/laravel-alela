<?php

namespace App\Http\Middleware;

use Closure;

class Dev
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
        if($request->user()->Role->role === "dev"){
            return $next($request);
        }
        return back()->withErrors("You are not authorized to access this section");
    }
}

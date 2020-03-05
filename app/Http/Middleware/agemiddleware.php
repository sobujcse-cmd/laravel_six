<?php

namespace App\Http\Middleware;

use Closure;

class agemiddleware
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
        if($request->name=='sobuj'){
            return $next($request);
           }
           return redirect('home');
    }
}

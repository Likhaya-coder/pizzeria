<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContentPublisher
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
        if(auth()->user()) {
            if(!in_array(auth()->user()->id, [2])) {
                abort(401);
            }
            return $next($request); //redirect('publisher');
        }
    }
}

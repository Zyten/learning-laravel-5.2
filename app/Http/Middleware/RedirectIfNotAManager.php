<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAManager
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
        if ( ! $request->user()->isATeamManager()) {
            return redirect('articles');
        }

        return $next($request);
        //For global middlewares, if want to access $request->user()
        // $response = $next($request);
        // Use $request->user() in logic...
        // return $response;
    }
}

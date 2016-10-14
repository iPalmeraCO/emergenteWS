<?php

namespace App\Http\Middleware;

use Closure;

use App;
use Redirect;

class ForceSSL
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
        // if (!$request->secure()) {
        //     return redirect()->secure($request->getRequestUri());
        // }

        // return $next($request);



        //  if( App::environment('local') ){
        //     return Redirect::secure($request->path());
        // }

        // return $next($request);
    }
}

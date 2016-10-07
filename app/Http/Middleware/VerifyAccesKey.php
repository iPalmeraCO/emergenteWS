<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAccesKey
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
        // var_dump("prueba"); die();
        // Obtenemos el api-key que el usuario envia
        $key = $request->headers->get('api_key');
        // // Si coincide con el valor almacenado en la aplicacion
        // // la aplicacion se sigue ejecutando
        if (isset($key) == env('API_KEY')) {
            return $next($request);
        } else {
            // Si falla devolvemos el mensaje de error
            return response()->json(['error' => 'unauthorized' ], 401);
        }

        //return $next($request);
    }
}

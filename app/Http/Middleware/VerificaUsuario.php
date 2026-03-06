<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class VerificaUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Funcionamiento del MIDDLEWARE (ESCRIBIR CODIGO AQUI)
        //VErificar si la sesion del usuario esta activa 
        if(!Auth::check()){
            return redirect()-> route('acceso')
            -> with('error','Se debe iniciar sesion o registrarse');
        }

        //Si la sesion esta iniciada, entonces el usuario puede acceder 
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ControlAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

         $blockAccess = true;

         if(auth()->user()->id == 1){
            $blockAccess = false;
         }

           if($blockAccess){

               return back()->with('danger', 'No cuentas con los permisos para acceder a este modulo, contacta con el administrador');

           }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Auth;

class SuspendedAccountEmploye
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
        if(Auth::user()->confirmed == false){

            Auth::logout();

            return redirect('/login')->with('daneger', 'Opps! algo no esta funcionando bien, por favor, vuelva a iniciar sesión');
            
          }
        return $next($request);
    }
}

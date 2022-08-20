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

            return redirect()->route('login')->with('danger', 'Opps! su cuenta esta suspendida temporalmente, por favor comuniquese con el administrador del sitio');
            
          }
        return $next($request);
    }
}

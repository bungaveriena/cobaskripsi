<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekRoleUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
     {
    //     if(in_array($request->user()->role->$roles)){
    //         return $next($request);
    //     }

    //     return redirect('/dashboard');
        if(!Auth::check()){
            return redirect('/dashboard');
        }
        $user = Auth::user();

        if($user->role_id == $roles)
            return $next($request);

        return redirect('/')->with('error', "tidak ada akses login");
     
    }
}

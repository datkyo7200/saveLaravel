<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        // if(Auth::check()){
            $users = Auth::user();
            if ($users->role->id==2) {
                return redirect('/');
            }
        // }else{
        //    return redirect('login');
        // }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckSuper
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
        if (!$request->session()->exists('adminData')) {
            // user value cannot be found in session
            return redirect('/');
            
        }
        else if($request->session()->get('adminData')->type != 'super')
        {
            return redirect('/');
        }
        

        return $next($request);
    }
}

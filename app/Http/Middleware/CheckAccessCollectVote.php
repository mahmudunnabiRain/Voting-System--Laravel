<?php

namespace App\Http\Middleware;


use Closure;
use app\Admin;

class CheckAccessCollectVote
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
        else if($request->session()->get('adminData')->access_collect_vote == 0)
        {
            return redirect('/');
        }
        

        return $next($request);
    }
}

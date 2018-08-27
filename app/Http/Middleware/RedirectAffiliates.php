<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectAffiliates
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
        if (Auth::guard()->check()) {
            return redirect('/administrator/maintenance/employees');
            // return redirect('/administrator/maintenance/berth');
            // return view (Auth::id());
        }
        return $next($request);
    }
}

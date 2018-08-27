<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectConsignee
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
            return redirect('/consignee/dashboard');
            // return redirect('/administrator/maintenance/berth');
            // return view (Auth::id());
        }
        return $next($request);
    }
}

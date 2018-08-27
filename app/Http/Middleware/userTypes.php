<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class userTypes
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
        if(!Auth::guest())
        {
            if(Auth::user()->enumUserType == 'Admin')
            {
                return $next($request);
                return redirect('/administrator/maintenance/berth');
            }
            if(Auth::user()->enumUserType == 'Affiliates')
            {
                return $next($request);
                return redirect('/administrator/maintenance/employees');
            }
            if(Auth::user()->enumUserType == 'Consignee')
            {
                return $next($request);
                return redirect('/administrator/maintenance/position');
            }
            else {
                return redirect('/login');
            }

        }
        // if(auth()->check() && $request->user()->intUUserTypeID == 1)
        // {
        //     return redirect('/tugboat');
        // }
        // else if(auth()->check() && $request->user()->intUUserTypeID == 2)
        // {

        // }
        // else if(auth()->check() && $request->user()->intUUserTypeID == 3)
        // {
            
        // }
        return $next($request);
    }
}

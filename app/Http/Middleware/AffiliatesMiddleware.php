<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Auth;

class AffiliatesMiddleware
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
        if(!Auth::guest()){
            if(Auth::user()->enumUserType == 'Affiliates'){   
                return $next($request);
                return redirect('/administrator/maintenance/employees');
            }else{
                Auth::logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect('/affiliates/login');
            }
        }
        return redirect('/affiliates/login');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

use App\Users;
use Auth;
class AdminMiddleware
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
            // dd(Auth::user()->enumUserType);
            if(Auth::user()->enumUserType == 'Admin')
            {   
                return $next($request);
                return redirect('/administrator/maintenance/berth');
            }elseif(Auth::user()->enumUserType == 'Affiliates'){
                return redirect('/affiliates/maintenance/employees');
            }else{
                Auth::logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect('/administrator/login');    
            }
            return redirect('/administrator/login');
        }
    }
}

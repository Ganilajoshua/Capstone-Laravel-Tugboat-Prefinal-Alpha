<?php

namespace App\Http\Middleware;

use App\Users;
use Closure;
use Session;
use Auth;

class ConsigneeMiddleware
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
            if(Auth::user()->enumUserType == 'Consignee'){
                if(Auth::user()->isActive == '0' || 0){
                    Auth::logout();
                    $request->session()->flush();
                    $request->session()->regenerate();
                    Session::flash('flash_message','Account not Verified');
                    return redirect('/consignee/login');
                }else{
                    return $next($request);
                    return redirect('/consignee/dashboard');
                }
            }else{
                Auth::logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect('/');
            }
        }
    }
}

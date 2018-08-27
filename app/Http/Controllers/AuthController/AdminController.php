<?php

namespace App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:tugC');
    }
    public function showLogin()
    {
        return view('auth.adminlogin');
    }
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $email =  $request->email;
        $password = $request->password;

        if(Auth::guard('tugC')->attempt([
            'strUserEmail' => $request->email,
            'strUserPassword' => $request->password,
        ],$request->remember))
        {
            
            return redirect('/administrator/maintenance/tugboat');
        }
        // return redirect('/login');
    }
}

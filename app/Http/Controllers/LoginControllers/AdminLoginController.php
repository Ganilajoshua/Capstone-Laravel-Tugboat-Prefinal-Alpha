<?php

namespace App\Http\Controllers\LoginControllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Company;
use App\User;
use Session;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('authadmin')->except('logout');
    }
    public function showLogin()
    {
        return view('Login.adminLogin');
    }
    public function login(Request $request){
        if(Auth::guard('web')->attempt(['email' => $request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended('/administrator/maintenance/pier');
        }
    }
    public function showRegister(){
        return view('Login.adminRegister');
    }
    public function register(Request $request){
        $comp = Company::max('intCompanyID')+1;
        $ID = $comp;
        $company = new Company;
        $company->timestamps = false;
        $company->intCompanyID = $ID;
        $company->strCompanyName = $request->input('companyname');
        $company->strCompanyAddress = $request->input('address');
        $company->strCompanyEmail = $request->input('email');
        $company->strCompanyContactPNum = $request->input('mobilenum');
        $company->strCompanyContactTNum = $request->input('telnum');
        $company->save();
        // return response(['username'=>$request->input('username')]);
        $user = User::create([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'intUCompanyID' => $ID,
            'enumUserType' => '1',
            'isActive' => '1',
        ]);

        // return response(['success']);
        return redirect('/administrator/login');

    }
    public function logout(Request $request)
    {
        if(Auth::user()->enumUserType == 'Admin'){
            Auth::logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/administrator/login');
        }else{
            Auth::logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/affiliates/login');
        }

    }
    
}

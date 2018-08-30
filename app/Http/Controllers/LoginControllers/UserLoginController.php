<?php

namespace App\Http\Controllers\LoginControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Company;

use Auth;
use Session;

class UserLoginController extends Controller
{
    public function __construct(){
        $this->middleware('authconsignee')->except('logout');
    }
    public function showRegister()
    {
        return view('Login.register');
    }
    public function showLogin()
    {
        return view('Login.login');
    }
    public function login(Request $request)
    {
        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended('/consignee/dashboard');
        }

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
            'enumUserType' => '4',
        ]);
        // return response(['success']);
        return redirect('/consignee/login');
    }
    public function logout(Request $request){
        
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
}

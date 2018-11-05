<?php

namespace App\Http\Controllers\LoginControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Notifications\VerifyEmail;
use App\Http\Controllers\Controller;
use App\User;
use App\Balance;
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
        else{
            return redirect()->intended('/consignee/login');
        }

    }
    public function register(Request $request){
        // return $request->all();
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


        if($request->hasFile('file')){
            // return $request->all();
            $image = $request->file('file');
            $filename = $request->file->getClientOriginalName();
            $company->strCompanyPermit = $filename;
            $destinationPath = public_path('/pictures/consignee/permits');
            $image->move($destinationPath,$filename);
            

            // $request->file->storeAs('public/stisla_admin_v1.0.0/dist/img/Consignee/Permits',$filename);
        }
        $company->save();

        $bill = new Balance;
        $bill->timestamps = false;
        $bill->intBalanceID = $ID;
        $bill->save();

        // return response(['username'=>$request->input('username')]);
        $user = User::create([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'intUCompanyID' => $ID,
            'enumUserType' => '4',
            'token' => Str::random(25)
        ]);

        // Verify Email
        $user->notify(new VerifyEmail($user));
        // return $user;
        // return response(['success']);
        return redirect('/consignee/login');
    }
    public function logout(Request $request){
        
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }

    public function verifyemail($token){
        $user = User::where('token',$token)->firstOrFail();
        $user->update(['token' => null]);
        return redirect('/consignee/login');
    }
}

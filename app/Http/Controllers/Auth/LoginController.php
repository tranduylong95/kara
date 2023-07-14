<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Session;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function show(){
        
        return view('auth/login');
    }
    
    public function login(Request $request)
    {
        
        $rules =[
           'account'=>'required',
           'password'=>'required',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
           $errors=$validator->errors();
           return  redirect()->route('login')->with('errors',$errors ); 
        }
        else
        {
            if (Auth::attempt(['account'=>$request->account,'password'=>$request->password])) {
                if(Auth::user()->status==1){
                return redirect()->route('home');
                }
                else {
                    Auth::logout();
                    Session::flush();
                      return view('auth/login')->with('error_password','Tài khoản tạm ngưng sử dụng');
                }
            }
            else
            {
                $check_account=true;
                $data=Employee::where('account', $request->account)->first();
                if(!$data){
                    return view('auth/login')->with('error_account','Tên đăng nhập không tồn tại');
                }
                else {
                     return view('auth/login')->with('error_password','Mật khẩu không đúng');
                }
            }
        }
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('logout');
    }
}

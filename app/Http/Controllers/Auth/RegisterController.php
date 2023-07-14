<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;
use App\Models\CompanyChild;
use App\Models\Employee;
use App\Models\Account;
use App\Models\EmployeeCompanyChild;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->Company=new Company;
        $this->CompanyChild=new CompanyChild;
        $this->Employee=new Employee;
        $this->Account=new Account;
        $this->EmployeeCompanyChild=new EmployeeCompanyChild;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function show(){
        return view('auth/register');
    }

    public function register(Request $request){
        $rules =[
            'NameCompany' => 'required',
            'NameCompanyChild' => 'required',
            'AdressCompanyChild' => 'required',
            'Phone' => 'required|regex:/^[0-9]+$/',
            'Email' => 'required',
            'Account' => 'required',
            'Password' => 'required',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
           $errors=$validator->errors();

           return  redirect()->route('register.show')->with( 'errors' ,$errors );
        }
        else {
           $this->Company->name=$request->NameCompany;
           $this->Company->save();
           $this->CompanyChild->name=$request->NameCompanyChild;
           $this->CompanyChild->company_id=$this->Company->id;
           $this->CompanyChild->adress=$request->AdressCompanyChild;
           $this->CompanyChild->phone=$request->Phone;
           $this->CompanyChild->save();
           $this->Account->account_name=$request->Account;
           $this->Account->password=Hash::make($request->Password);
           $this->Account->save();
           $this->Employee->name="Admin";
           $this->Employee->id_account=$this->Account->id;
           $this->Employee->id_company=$this->Company->id;
           $this->Employee->email=$request->Email;
           $this->Employee->save();
           $this->EmployeeCompanyChild->id_company_child=$this->CompanyChild->id;
           $this->EmployeeCompanyChild->Employee_id=$this->Employee->id;
           $this->EmployeeCompanyChild->save();
           return redirect()->route('login');

        }
       
    }
}

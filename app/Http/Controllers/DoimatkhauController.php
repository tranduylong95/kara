<?php

namespace App\Http\Controllers;

use App\Models\Employee;

use Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmployeeRequest;
class DoimatkhauController extends Controller
{
	 function __construct()
    {
        $this->Employee = new Employee;
        
    }
    public function index()
   {
    	return view('doimk/doimk');
   }
   public function doimk(Request $request){
      $data=$this->Employee->find(Auth::user()->id);
      if(Hash::check($request->password, Auth::user()->password)){
      	$data->password=$request->password_after;
      	$data->update();
      	return redirect('/dashboard');
      }
      return view('doimk/doimk')->with('error','Mật khẩu trước nhập không chính xác');
   }
}

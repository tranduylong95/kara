<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmployeeRequest;

class employeecontroller extends Controller
{
    function __construct()
    {
        $this->Employee = new Employee;
        
    }
    public function index(){
    	$data=$this->Employee->where('id_company_child',Session::get('id_company_child'))->paginate(10);
    	return view('employee/index')->with('data',$data);
    }
    public function create_show(){
    	return view('employee/create');
    }
    public function create(EmployeeRequest $request){
    	$id_company_child=Session::get('id_company_child');
        $this->Employee->name=$request->name;
        $this->Employee->account=$request->account;
        $this->Employee->password=Hash::make($request->password);
        $this->Employee->phone=$request->phone;
        $this->Employee->id_company_child=$id_company_child[0];
        $this->Employee->rank=$request->rank;
        $this->Employee->status=$request->status;
        $this->Employee->save();
        return redirect('/employee');
    }
    public function show($id){
       $data=$this->Employee->find($id);
       return view('employee/edit')->with('data',$data);
    }
    public function update(EmployeeRequest $request, $id){
        $data=$this->Employee->find($id);
		$data->name=$request->name;
		$data->account=$request->account;
        $data->password=Hash::make($request->password);
        $data->phone=$request->phone;
        $data->rank=$request->rank;
        $data->status=$request->status;
        $data->update();
        return redirect('/employee');
    }
    
    public function delete($id){
         $this->Employee->find($id)->delete();
          return redirect('/employee');
    }
}

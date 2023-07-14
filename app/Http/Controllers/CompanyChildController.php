<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use App\Models\CompanyChild;
use Illuminate\Http\Request;
use App\Models\EmployeeCompanyChild;
use Auth;
use Session;
class CompanyChildController extends Controller
{
	 public function __construct()
    {
        
        $this->CompanyChild = new CompanyChild;
        $this->EmployeeCompanyChild=new EmployeeCompanyChild;
    }

    public function GetAllCompanyChild()
    {
    	$data= $this->EmployeeCompanyChild->where('Employee_id',Auth::user()->Employee->id)->get();

        $Company_Child=new Collection;
    	foreach ($data as $val) {
    		 
    		 $Company_Child->push($this->CompanyChild->find($val->id_company_child));
    	}
    	
    	return $Company_Child;
    }
    public function SetUserCompanyChild(Request $request){
      Session::put('id_company_child',$request->id_company_child);
    }
}

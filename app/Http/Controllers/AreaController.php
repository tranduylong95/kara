<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Room;
use App\Models\PriceTime;
use Session;
class AreaController extends Controller
{   
	
	function __construct()
    {
        $this->Area=new Area;
        $this->Room=new Room;
        $this->PriceTime=new PriceTime;
    }

    public function save(Request $request)
    {   
        $id_company_child=Session::get('id_company_child');
        
    	$this->PriceTime->price_0_8=$request->Price_Time_1;
    	$this->PriceTime->price_8_16=$request->Price_Time_2;
    	$this->PriceTime->price_16_24=$request->Price_Time_3;
    	$this->PriceTime->save();
    	
    	$this->Area->name=$request->NameArea;
    	$this->Area->id_company_child=$id_company_child[0];
    	$this->Area->id_price_time=$this->PriceTime->id;
    	$this->Area->save();

    	if($request->NumberRoom&&$request->NumberRoom>0){
    		for ($i=1; $i<=$request->NumberRoom; $i++) { 
    			$this->Room=new Room;
    			$this->Room->name=$i;
    			$this->Room->id_area=$this->Area->id;
    			$this->Room->id_price_time=$this->PriceTime->id;
    			$this->Room->id_company_child=$id_company_child[0];
    			$this->Room->save();
    		}
    	}
    }
    public function ListArea(){
        $data=$this->Area->where('id_company_child',Session::get('id_company_child'))->with('PriceTime')->with('Room')->with('CompanyChild')->get();
        
        return $data;
    }
    public function delete($id){

    }

   
}

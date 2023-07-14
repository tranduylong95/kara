<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Area;
use App\Models\PriceTime;
use Session;

class RoomController extends Controller
{
	
	function __construct()
    {
        $this->Room = new Room;
        $this->Area=new Area;
        $this->PriceTime=new PriceTime;
    }

    public function index()
	{   $data=$this->Room->where('id_company_child',Session::get('id_company_child'))->with('Area')->paginate(10);
	    $data_area=$this->Area->where('id_company_child',Session::get('id_company_child'))->get();
        
	    return view('room/room')->with('data',$data)->with('data_area',$data_area);
	}
	public function save(Request $request){
         $id_company_child=Session::get('id_company_child');
         $this->Room->name=$request->name;
         $this->Room->id_area=$request->select_area;
         $this->Room->id_company_child=$id_company_child[0];
         $this->Room->id_price_time=$this->Area->find($request->select_area)->PriceTime->id;
         $this->Room->save();
	}
	public function update($id,Request $request){
		$data=$this->Room->find($id);
		$data->name=$request->name;
		$data->id_area=$request->select_area;
		$this->PriceTime->price_0_8=$request->Price_Time_1;
        $this->PriceTime->price_8_16=$request->Price_Time_2;
        $this->PriceTime->price_16_24=$request->Price_Time_3;
        $this->PriceTime->save();
        $data->id_price_time=$this->PriceTime->id;
        $data->update();
	}
	public function delete($id){
       $this->Room->find($id)->delete();
	}
	public function show($id){
		
       $data=$this->Room->with('PriceTimeRoom')->with('Area')->find($id);
       return $data;
	}
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Models\Area;
use App\Models\PriceTime;
use App\Models\Product;
use App\Models\Price;
use App\Models\Category;
use App\Models\TimeMoney;
use App\function_auto\function_auto_code;
use Session;
use Auth;
use Carbon\Carbon;
class TimeController extends Controller
{   function __construct()
    {
        $this->Room = new Room;
        $this->Area=new Area;
        $this->PriceTime=new PriceTime;
        $this->Product=new Product;
        $this->Category=new Category;
        $this->Order=new Order;
        $this->DetailOrder=new DetailOrder;
        $this->Price=new Price;
        $this->TimeMoney=new TimeMoney;
        $this->function_auto=new function_auto_code;
    }
    public function TimeMoneyInOrder(Request $request)
    {   
    	$data_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$request->id_room)->where('status',1)->first();
         $data_timemoney=$this->TimeMoney->where('id_order',$data_order->id)->where('status',1)->first();
           $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
           $time=$data_timemoney->hour_limit;
           $hour_limit=new Carbon($time);
           $hour_start=null;
           if($now>$hour_limit){
             
              for ($i=$hour_limit; $i <$now;) {
                $this->TimeMoney=new TimeMoney;
                $this->TimeMoney->id_room=$data_order->id_room;
                $this->TimeMoney->id_order=$data_order->id;
                if($hour_limit->hour==0)
                {
                $this->TimeMoney->price_time=$this->Room->where('id_company_child',Session::get('id_company_child'))->find($data_order->id_room)->PriceTimeRoom->price_0_8;
                $time_start=new Carbon($hour_limit);
                $this->TimeMoney->time_start=$time_start;
                 
                }
                else if($hour_limit->hour==8){
                  $this->TimeMoney->price_time=$this->Room->where('id_company_child',Session::get('id_company_child'))->find($data_order->id_room)->PriceTimeRoom->price_8_16;
                  $time_start=new Carbon($hour_limit);
                  $this->TimeMoney->time_start=$time_start;
                   
                  
                }
                else if($hour_limit->hour==16){
                   $this->TimeMoney->price_time=$this->Room->where('id_company_child',Session::get('id_company_child'))->find($data_order->id_room)->PriceTimeRoom->price_16_24;
                  $time_start=new Carbon($hour_limit);
                   $this->TimeMoney->time_start=$time_start;
                   
                }
                $hour_limit=$hour_limit->addHours(8);
                $this->TimeMoney->time_finish=$hour_limit;
                $this->TimeMoney->hour_limit=$hour_limit;
                if($hour_limit>$now){
                    $this->TimeMoney->status=1;
                    $this->TimeMoney->time_finish=null;
                 
                }
                else {
                     $this->TimeMoney->status=0;
                }
                $this->TimeMoney->save();
    
              }
              $time_limit=$data_timemoney->hour_limit;
            if(!$data_timemoney->time_finish){
	              $data_timemoney->status=0;
	              $data_timemoney->time_finish=$time_limit;
	              $data_timemoney->update();
	              }
	              else {
	              $data_timemoney->status=0;
	              $data_timemoney->update();
	        }
        }
    	$start=$this->Order->where('id_company_child',Session::get('id_company_child'))->with('TimeMoney')->find($data_order->id)->created_at;

    	$start = Carbon::create($start);
    	$data=$this->Order->where('id_company_child',Session::get('id_company_child'))->with('TimeMoney')->find($data_order->id)->TimeMoney;
        $total=0;
        foreach ($data as $value) {
        	if(!$value->time_finish){
                $time_start=Carbon::parse($value->time_start);
                $time_finish=Carbon::parse(Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString());
        		$total+=$time_finish->diffInMinutes($time_start)*$value->price_time/60-$time_finish->diffInMinutes($time_start)*$value->price_time/60*$value->discount_time/100;
        	}
        	else {
        		// return $value->time_start;
        		// return $value->time_finish;
        		$time_start=Carbon::parse($value->time_start);
        		$time_finish=Carbon::parse($value->time_finish);
        		$total+=$time_finish->diffInMinutes($time_start)*$value->price_time/60-$time_finish->diffInMinutes($time_start)*$value->price_time/60*$value->discount_time/100;
        		
        	}
        }

        return (int)$total;
    }
    public function DiscountMoneyTimeInOrder(Request $request){
         $discount_money_timeroom=0;
         $id_company_child=Session::get('id_company_child');
         $order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$request->idRoom)->where('status',1)->first();
         if($order){
            $order->discount_time=$request->discount_time;
            $order->update();
            $data=$this->TimeMoney->where('id_order',$order->id)->where('move',0)->get();
            foreach ($data as $key => $value) {
            	$data1=$this->TimeMoney->find($value->id);
            	$data1->discount_time=$request->discount_time;
            	$data1->update();
            }
          
         }
         else {
            $data2=$this->Room->find($request->idRoom);
            $data2->active=1;
            $data2->update();
            $data1=$this->Order->where('id_company_child',$id_company_child)->get();
            $this->Order->id_room=$request->idRoom;
            $this->Order->code_order= $this->function_auto->code_auto_order("HD",$data1);
            $this->Order->id_company_child=$id_company_child[0];
            $this->Order->id_employee=Auth::user()->Employee->id;
            $this->Order->discount_time=$request->discount_time;
            $this->Order->save();
            
            $now = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
            $time1 = new Carbon('00:00:00') ;
            $time2= new Carbon('08:00:00');
            $time3= new Carbon('16:00:00');
            $this->TimeMoney->id_room=$request->idRoom;
            $this->TimeMoney->id_order=$this->Order->id;
            if($now>$time1->toTimeString()&&$now<$time2->toTimeString()){
                  $this->TimeMoney->price_time= $this->Room->where('id_company_child',Session::get('id_company_child'))->find($request->idRoom)->PriceTimeRoom->price_0_8;
                  $this->TimeMoney->hour_limit=$time2;
                  $this->TimeMoney->discount_time=$request->discount_time;
            }     
            elseif($now>$time2->toTimeString()&&$now<$time3->toTimeString()){
                $this->TimeMoney->price_time= $this->Room->where('id_company_child',Session::get('id_company_child'))->find($request->idRoom)->PriceTimeRoom->price_8_16;
                $this->TimeMoney->hour_limit=$time3;
                $this->TimeMoney->discount_time=$request->discount_time;
            }
            else{
                $time10 =new Carbon('23:59:59');
                $this->TimeMoney->price_time= $this->Room->where('id_company_child',Session::get('id_company_child'))->find($request->idRoom)->PriceTimeRoom->price_16_24;
                $this->TimeMoney->hour_limit=$time10->addSeconds(1);
                $this->TimeMoney->discount_time=$request->discount_time;
                
            }
            $this->TimeMoney->time_start=Carbon::now('Asia/Ho_Chi_Minh');
            $this->TimeMoney->status=1;
            $this->TimeMoney->save();
         }
        
    }
}

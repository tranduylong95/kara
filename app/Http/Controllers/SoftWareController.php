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
use App\Models\CompanyChild;
use App\function_auto\function_auto_code;
use Session;
use Auth;
use Carbon\Carbon;
class SoftWareController extends Controller
{
	function __construct()
    {
        $this->Room = new Room;
        $this->Area=new Area;
        $this->PriceTime=new PriceTime;
        $this->Product=new Product;
        $this->Category=new Category;
        $this->Order=new Order;
        $this->DetailOrder=new DetailOrder;
        $this->function_auto=new function_auto_code;
        $this->Price=new Price;
        $this->TimeMoney=new TimeMoney;
        $this->CompanyChild=new CompanyChild;
    }
    public function index()
    {  
    	$data=$this->Room->where('id_company_child',Session::get('id_company_child'))->with('Area')->get();
        $data_area=$this->Area->where('id_company_child',Session::get('id_company_child'))->get();
        $data_product=$this->Product->where('id_company_child',Session::get('id_company_child'))->with('Price')->get();
        $data_category=$this->Category->where('id_company_child',Session::get('id_company_child'))->get();
        $data_order_room=$this->Order->where('status',1)->get();
    	return view("software/software")->with('data_room',$data)->with('data_area',$data_area)->with('data_product',$data_product)->with('data_category',$data_category)->with('data_order_room',$data_order_room);
    }
    public function ListProductInCategory($id)
    {
        if($id>0)
        {
        
         return $this->Category->where('id_company_child',Session::get('id_company_child'))->find($id)->productandprice;
        }
        else {
            return $this->Category->where('id_company_child',Session::get('id_company_child'))->with('productandprice')->get();
        }
    }
    public function AreaFindRoom($id){
       if($id!=0)
       {
         return  $this->Area->where('id_company_child',Session::get('id_company_child'))->with('Room.OrderActive')->find($id);
       }
       else {
        return  $this->Area->where('id_company_child',Session::get('id_company_child'))->with('Room.OrderActive')->get();
       }
    }
    public function TimeRoom($id){

        $this->Room->where('id_company_child',Session::get('id_company_child'))->find($id);
        $data=$this->Room->where('id_company_child',Session::get('id_company_child'))->find($id)->PriceTimeRoom;
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
        $time1 = new Carbon('00:00:00') ;
        $time2= new Carbon('08:00:00');
        $time3= new Carbon('16:00:00');
        
        if($now>$time1->toTimeString()&&$now<$time2->toTimeString()){
            return $data->price_0_8;
        }
        elseif($now>$time2->toTimeString()&&$now<$time3->toTimeString()){
            return $data->price_8_16;
        }
        else {
            return $data->price_16_24;
        }
        
    }
    public function OrderInRoom($id){
        $data_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$id)->where('status',1)->with('DetailOrder.Product')->with('DetailOrder.Price')->with('DetailOrder.Unit')->first();
      if($data_order){
           $data_timemoney=$this->TimeMoney->where('id_order',$data_order->id)->where('status',1)->first();
           $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
           $time=$data_timemoney->hour_limit;
           $hour_limit=new Carbon($time);
           $hour_start=null;
           if($now>$hour_limit){
              $data_timemoney->status=0;
              $data_timemoney->time_finish=$time;
              $data_timemoney->update();
            
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
                $this->TimeMoney->discount_time=$data_order->discount_time;
                $this->TimeMoney->save();

              }
            
           }
       }
       return $this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$id)->where('status',1)->with('DetailOrder.Product')->with('DetailOrder.Price')->with('DetailOrder.Unit')->first();
    }
    public function addProductInRoom($id,Request $request){
       $data=$this->Room->where('active',1)->find($request->idRoom);
       $id_company_child=Session::get('id_company_child');
       if($data){
            $data1=$this->Order->where('id_room',$request->idRoom)->where('status',1)->first();
            $data2=$this->Order->find($data1->id)->DetailOrder;
            $start=true;
            foreach ($data2 as  $value) {
                if($value->id_product==$id){
                    $data3=$this->DetailOrder->find($value->id);
                    $price=$this->Price->find($value->id_price);
                    $data3->number=$value->number +1; 
                    $data3->money_total=$price->price_sell*($value->number+1)-$value->discount_product/100*($price->price_sell*($value->number+1));
                    $data3->update();
                    $start=false;
                    break;
                }
            }
            if($start){
                $this->DetailOrder->id_order=$data1->id;
                $this->DetailOrder->id_product=$id;
                $this->DetailOrder->id_price=$this->Product->find($id)->price->id;
                $this->DetailOrder->id_dvt=$this->Product->find($id)->id_dvt;
                $this->DetailOrder->money_total=$this->Product->find($id)->price->price_sell;
                $this->DetailOrder->save();
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
            $this->Order->id_employee=Auth::user()->id;
            $this->Order->save();
            $this->DetailOrder->id_order=$this->Order->id;
            $this->DetailOrder->id_product=$id;
            $this->DetailOrder->id_price=$this->Product->find($id)->price->id;
            $this->DetailOrder->money_total=$this->Product->find($id)->price->price_sell;
            $this->DetailOrder->id_dvt=$this->Product->find($id)->id_dvt;
            $this->DetailOrder->save();
            $now = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
            $time1 = new Carbon('00:00:00') ;
            $time2= new Carbon('08:00:00');
            $time3= new Carbon('16:00:00');
            $this->TimeMoney->id_room=$request->idRoom;
            $this->TimeMoney->id_order=$this->Order->id;
            if($now>$time1->toTimeString()&&$now<$time2->toTimeString()){
                  $this->TimeMoney->price_time= $this->Room->where('id_company_child',Session::get('id_company_child'))->find($request->idRoom)->PriceTimeRoom->price_0_8;
                  $this->TimeMoney->hour_limit=$time2;
            }
            elseif($now>$time2->toTimeString()&&$now<$time3->toTimeString()){
                $this->TimeMoney->price_time= $this->Room->where('id_company_child',Session::get('id_company_child'))->find($request->idRoom)->PriceTimeRoom->price_8_16;
                $this->TimeMoney->hour_limit=$time3;
            }
            else{
                $time10 =new Carbon('23:59:59');
                $this->TimeMoney->price_time= $this->Room->where('id_company_child',Session::get('id_company_child'))->find($request->idRoom)->PriceTimeRoom->price_16_24;
                $this->TimeMoney->hour_limit=$time10->addSeconds(1);
                
            }
            $this->TimeMoney->time_start=Carbon::now('Asia/Ho_Chi_Minh');
            $this->TimeMoney->save();

        }

    }
    public function CheckRoomActive($id){
         $data= $this->Room->where('active',1)->find($id)->OrderActive;
          return $data;
    }
    public function MinusOrPlusProductInOrder(Request $request){
        $id_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$request->id_room)->where('status',1)->first()->id;
        $data=$this->DetailOrder->where('id_order',$id_order)->where('id_product',$request->id_product)->first();
        if(!$request->number){
            $request->number=1;
        }
        $data->number=$request->number;
        $data->update();

    }
    public function DiscountProductInOrder(Request $request){
         $id_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$request->id_room)->where('status',1)->first()->id;
        $data=$this->DetailOrder->where('id_order',$id_order)->where('id_product',$request->id_product)->first();
        $data->discount_product=$request->discount;
        $data->update();
    }
    public function DeleteProductInOrder(Request $request){
          $id_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$request->id_room)->where('status',1)->first()->id;
           $data=$this->DetailOrder->where('id_order',$id_order)->where('id_product',$request->id_product)->first();
           $data->delete();
    }
    public function DiscountOrderInRoom(Request $request){
        $data_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$request->id_room)->where('status',1)->first();
        $data_order->discount_order=$request->discount_order;
        $data_order->update();
    }
    public function VatOrderInRoom(Request $request ){
         $data_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$request->id_room)->where('status',1)->first();
        $data_order->VAT=$request->VAT;
        $data_order->update();
    }
    public function SearchProduct(Request $request){
        $data=$this->Product->where('id_company_child',Session::get('id_company_child'))->where('status',1)->where('name','like', '%' .$request->search_product . '%')->with('category')->with('price')->get();
        return $data;
    }
    public function MoveRoom(Request $request){
        $now1= Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
        $time1 = new Carbon('00:00:00') ;
        $time2= new Carbon('08:00:00');
        $time3= new Carbon('16:00:00');
        
       $data=$this->Room->find($request->id_room);
       if($data->active==1){
             $data1=$this->Room->find($request->id_room_to);
             if($data1->active==1){

             }
             else {
                $data_order=$this->Order->where('id_room',$request->id_room)->where('status',1)->first();
                $number_move_timemoney=$this->TimeMoney->where('id_order',$data_order->id)->max('move');
                $data_timemoney=$this->TimeMoney->where('id_order',$data_order->id)->where('move',0)->get();

                foreach ($data_timemoney as $value) {
                     $data_timemoney_room=$this->TimeMoney->find($value->id);
                     $data_timemoney_room->move=$number_move_timemoney+1;
                     $data_timemoney_room->update();
                }
                $data_timemoney_last=$this->TimeMoney->where('id_order',$data_order->id)->where('move',$number_move_timemoney+1)->orderBy('id', 'desc')->first();
                $data_timemoney_last->time_finish=$now1;
                $data_timemoney_last->status=0;
                $data_timemoney_last->update();
                $data->active=0;
                $data->update();
                $data_order->id_room=$request->id_room_to;
                $data_order->discount_time=0;
                $data_order->update();
                $data1->active=1;
                $data1->update();
                $this->TimeMoney->id_room=$request->id_room_to;
                $this->TimeMoney->id_order=$data_order->id;
                if($now>$time1->toTimeString()&&$now<$time2->toTimeString()){
                          $this->TimeMoney->price_time= $this->Room->where('id_company_child',Session::get('id_company_child'))->find($request->id_room_to)->PriceTimeRoom->price_0_8;
                          $this->TimeMoney->hour_limit=$time2->toDateTimeString();
                }
                elseif($now>$time2->toTimeString()&&$now<$time3->toTimeString()){
                        $this->TimeMoney->price_time= $this->Room->where('id_company_child',Session::get('id_company_child'))->find($request->id_room_to)->PriceTimeRoom->price_8_16;
                        $this->TimeMoney->hour_limit=$time3->toDateTimeString();
                    }
                    else{
                        $time10 =new Carbon('23:59:59');
                        $this->TimeMoney->price_time= $this->Room->where('id_company_child',Session::get('id_company_child'))->find($request->id_room_to)->PriceTimeRoom->price_16_24;
                        $this->TimeMoney->hour_limit=$time10->addSeconds(1)->toDateTimeString();
                        
                    }
                    $this->TimeMoney->time_start=$now1;
                    $this->TimeMoney->save();
                
             }
       }
       else {

       }
    }
    public function Payment($id_room){
          
        $data_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$id_room)->where('status',1)->with('DetailOrder.Product')->with('DetailOrder.Price')->with('DetailOrder.Unit')->first();
        $data_order1=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$id_room)->where('status',1)->first();
          $data_order1->status=0;
          $data_order1->update();
          $data_room1=$this->Room->find($id_room);
          $data_room1->active=0;
          $data_room1->update();
          $data_timemoney1=$this->TimeMoney->where('id_order',$data_order->id)->where('status',1)->first();
          $data_timemoney1->status=0;
          $data_timemoney1->time_finish=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
          $data_timemoney1->update();
          $data_room=$this->Room->find($id_room);
          $id_company_child=Session::get('id_company_child');
          $data_company_child=$this->CompanyChild->find($id_company_child[0]);
          $data_timemoney=$this->TimeMoney->where('id_order',$data_order->id)->get();
        return view('software/bill')->with('data_order',json_decode(json_encode($data_order)))->with('data_room',$data_room)->with('data_company_child',$data_company_child)->with('data_timemoney',$data_timemoney);
    }
    public function tamtinh($id_room){
          
        $data_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('id_room',$id_room)->where('status',1)->with('DetailOrder.Product')->with('DetailOrder.Price')->with('DetailOrder.Unit')->first();
       
          $data_room=$this->Room->find($id_room);
          $id_company_child=Session::get('id_company_child');
          $data_company_child=$this->CompanyChild->find($id_company_child[0]);
          $data_timemoney=$this->TimeMoney->where('id_order',$data_order->id)->get();
        return view('software/bill1')->with('data_order',json_decode(json_encode($data_order)))->with('data_room',$data_room)->with('data_company_child',$data_company_child)->with('data_timemoney',$data_timemoney);
    }
}

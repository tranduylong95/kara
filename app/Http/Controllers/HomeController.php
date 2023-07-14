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

use App\Models\EmployeeComPanyChild;
use App\function_auto\function_auto_code;
use Session;
use Auth;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
        $this->middleware('auth');
        $this->EmployeeComPanyChild = new EmployeeComPanyChild;
        $this->Room= new Room;
        $this->Area=new Area;
        $this->PriceTime=new PriceTime;
        $this->Product=new Product;
        $this->Category=new Category;
        $this->Order=new Order;
        $this->DetailOrder=new DetailOrder;
        $this->function_auto=new function_auto_code;
        $this->Price=new Price;
        $this->TimeMoney=new TimeMoney;
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        
        if (!session()->has('id_company_child')){
            session()->push('id_company_child',Auth::user()->id_company_child);
            
        }
        
        $date = Carbon::now();
        $formatedDate = $date->format('Y-m-d 00:00:00');

        $data_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('status',0)->whereBetween('created_at',[$formatedDate,Carbon::tomorrow()])->with('Room')->with('Room.Area')->with('DetailOrder.Product')->with('DetailOrder.Price')->with('DetailOrder.Unit')->with('TimeMoney')->get();
         $total1=0;
         $total_product1=0;
         $total_time1=0;
         $CK=0;
         $VAT1=0;
        foreach($data_order as $value){
                $total=0;
                $total_product=0;
                $total_time=0;
                $ck=0;
                $VAT=0;
               foreach($value->timemoney as $item){
                  $a=strtotime($item->time_finish)-strtotime($item->time_start);
                  $total+=ceil(round($item->price_time/60*round($a/60))-round($item->price_time/60*round($a/60))*$item->discount_time/100);
                   $total_time+=ceil(round($item->price_time/60*round($a/60))-round($item->price_time/60*round($a/60))*$item->discount_time/100);
               }
               foreach ($value->detailorder as $item ) {
                    $total+=ceil($item->price->price_sell*$item->number-$item->price->price_sell*$item->number*$item->discount_product/100);
                    $total_product+=ceil($item->price->price_sell*$item->number-$item->price->price_sell*$item->number*$item->discount_product/100);
                 
               }
               $VAT+=ceil($total/100*$value->VAT);
               $total=ceil($total+$total/100*$value->VAT-$total/100*$value->discount_order);
               $total1+=$total;
               $total_time-$total+$total_product+$VAT;
               $total_time1+=$total_time;
               $total_product1+=$total_product;
               $VAT1+=$VAT;

        }
               $CK+=$total_time1+$total_product1+$VAT1-$total1;
                $data=$this->Room->where('id_company_child',Session::get('id_company_child'))->with('Area')->get();
                $data_active=$this->Room->where('id_company_child',Session::get('id_company_child'))->where('active',1)->with('Area')->get();
        $data_money=array();
        for ($i=6; $i >=0 ; $i--) {
         $date = Carbon::now()->subDays($i);
         $formatedDate = $date->format('Y-m-d 00:00:00');
         $formatedDate1 = $date->format('Y-m-d 23:59:59');
         $data_money_total=0;
         $VAT=0;
        
         $data3=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('status',0)->whereBetween('created_at',[$formatedDate, $formatedDate1])->with('Room')->with('Room.Area')->with('DetailOrder.Product')->with('DetailOrder.Price')->with('DetailOrder.Unit')->with('TimeMoney')->get();
         $data_money_total=0;
        foreach($data3 as $value){
               
               foreach($value->timemoney as $item){
                  $a=strtotime($item->time_finish)-strtotime($item->time_start);
                  $data_money_total+=ceil(round($item->price_time/60*round($a/60))-round($item->price_time/60*round($a/60))*$item->discount_time/100);
               }
               foreach ($value->detailorder as $item ) {
                    $data_money_total+=ceil($item->price->price_sell*$item->number-$item->price->price_sell*$item->number*$item->discount_product/100);       
               }
               $VAT+=ceil($data_money_total/100*$value->VAT);
               $data_money_total=ceil($data_money_total+$data_money_total/100*$value->VAT-$data_money_total/100*$value->discount_order);      
          }
          
          array_push($data_money,$data_money_total);
        }
       
        return view('home/dashboard')->with('data_order',$data_order)->with('total_time',$total_time1)->with('total_order',$total1)->with('total_product',$total_product1)->with('ck',$CK)->with('VAT',$VAT1)->with('room',$data)->with('room_active',$data_active)->with('data_money',$data_money);
    }
}

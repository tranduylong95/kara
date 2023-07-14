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
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('status',0)->with('Room')->with('Room.Area')->with('DetailOrder.Product')->with('DetailOrder.Price')->with('DetailOrder.Unit')->with('TimeMoney')->paginate(10);
        return view('order/order')->with('data_order',$data_order);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('status',0)->with('Room')->with('Room.Area')->with('DetailOrder.Product')->with('DetailOrder.Price')->with('DetailOrder.Unit')->with('TimeMoney')->find($id);
         return $data_order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
      $this->DetailOrder->where('id_order',$id)->delete();
      foreach ($request->detail_order as $value) {
         $this->DetailOrder=new DetailOrder;
         $this->DetailOrder->id_product=$value['id_product'];
         $this->DetailOrder->id_order=$request->id_order;
         $this->DetailOrder->id_price=$value['id_price'];
         $this->DetailOrder->number=$value['number'];
         $this->DetailOrder->discount_product=$value['discount_product'];
         $this->DetailOrder->id_dvt=$value['id_dvt'];
         $this->DetailOrder->save();
      }
      
      $data_order=$this->Order->find($id);
      $data_order->discount_order=$request->discount_order;
      $data_order->VAT=$request->VAT;
      $data_order->update();

    }
    public function SearchProduct(Request $request,$name){
        
        $data=$this->Product->where('id_company_child',Session::get('id_company_child'))->where('status',1)->where('name','like', '%' .$request->search_product . '%')->with('category')->with('price')->get();
        return $data;
    }
    public function PrinfInOrder($id){
        $data_order=$this->Order->with('DetailOrder.Product')->with('DetailOrder.Price')->with('DetailOrder.Unit')->find($id);
          $data_room=$this->Room->find($data_order->id_room);
          $id_company_child=Session::get('id_company_child');
          $data_company_child=$this->CompanyChild->find($id_company_child[0]);
          $data_timemoney=$this->TimeMoney->where('id_order',$data_order->id)->get();
        return view('software/bill')->with('data_order',json_decode(json_encode($data_order)))->with('data_room',$data_room)->with('data_company_child',$data_company_child)->with('data_timemoney',$data_timemoney);

    }
    public function SearchOrder(Request $request){
      
      $data_order=$this->Order->where('id_company_child',Session::get('id_company_child'))->where('status',0)->whereBetween('created_at', [$request->time_start, $request->time_to])->with('Room')->with('Room.Area')->with('DetailOrder.Product')->with('DetailOrder.Price')->with('DetailOrder.Unit')->with('TimeMoney')->paginate(10);
      $data_order->appends($request->all());
      return view('order/order')->with('data_order',$data_order);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Order->find($id)->delete();
        return redirect('/orders');
    }
}

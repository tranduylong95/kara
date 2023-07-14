<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use App\Http\Requests\ProductRequest;
use App\function_auto\function_auto_code;
use Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function __construct()
    {
      $this->Price_value=new Price;
      $this->Product_value=new Product;
      $this->Category_value=new Category;
      $this->Unit_value=new Unit;
      $this->function_auto=new function_auto_code();
     
    }
    public function index()
    {   
        $id_company_child= Session::get('id_company_child');
        return view ("product/productFE")->with('data_category',$this->Category_value->where('id_company_child',Session::get('id_company_child'))->get())->with('data_unit',$this->Unit_value->where('id_company_child',Session::get('id_company_child'))->get())->with('data_product',$this->Product_value->where('status',1)->where('id_company_child', $id_company_child)->with('category')->with('price')->paginate(10));
    }
  
    public function searchproduct(Request $request){

        if($request->status<=1){
            if($request->category==0){
                if($request->name_product){
                   $data=$this->Product_value->where('id_company_child',Session::get('id_company_child'))->where('status',$request->status)->where('name','like', '%' .$request->name_product . '%')->with('category')->with('price')->paginate(10,"*","",$request->number_page)->appends($request->all());
                   $firstItem=$data->firstItem();
                   $lastItem=$data->lastItem();
                   $total=$data->total();
                   return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
                }
                else {
                   $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->where('status',$request->status)->with('category')->with('price')->paginate(10,"*","",$request->number_page)->appends($request->all());
                   $firstItem=$data->firstItem();
                   $lastItem=$data->lastItem();
                   $total=$data->total();
                   return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
                }
            }
            else{
               $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->where('id_category',$request->category)->where('status',$request->status)->where('name','like', '%' .$request->name_product . '%')->with('category')->with('price')->paginate(10,"*","",$request->number_page)->appends($request->all());
                $firstItem=$data->firstItem();
                $lastItem=$data->lastItem();
                $total=$data->total();
                return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
            }
        }
        elseif($request->status==2){
            if($request->category==0){
                if($request->name_product){
                  $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->with('category')->with('price')->onlyTrashed()->paginate(10,"*","",$request->number_page)->appends($request->all());
                   $firstItem=$data->firstItem();
                   $lastItem=$data->lastItem();
                   $total=$data->total();
                   return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
                }
                else {
                    $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->with('category')->with('price')->onlyTrashed()->paginate(10,"*","",$request->number_page)->appends($request->all());
                    $firstItem=$data->firstItem();
                    $lastItem=$data->lastItem();
                    $total=$data->total();
                    return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
                 }
            }
            else{
                $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->where('id_category',$request->category)->where('name','like', '%' .$request->name_product . '%')->with('category')->with('price')->onlyTrashed()->paginate(10,"*","",$request->number_page)->appends($request->all());
                 $firstItem=$data->firstItem();
                 $lastItem=$data->lastItem();
                 $total=$data->total();
                 return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
             }
        }
        elseif($request->status==3){
            if($request->category==0){
                if($request->name_product){
                    $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->where('number','>',0)->where('name','like', '%' .$request->name_product . '%')->with('category')->with('price')->paginate(10,"*","",$request->number_page)->appends($request->all());
                    $firstItem=$data->firstItem();
                   $lastItem=$data->lastItem();
                   $total=$data->total();
                   return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
                }
                else {
                   $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->where('number','>',0)->with('category')->with('price')->paginate(10,"*","",$request->number_page)->appends($request->all());
                   $firstItem=$data->firstItem();
                   $lastItem=$data->lastItem();
                   $total=$data->total();
                   return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
                }
            }
            else{
                $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->where('id_category',$request->category)->where('number','>',0)->where('name','like', '%' .$request->name_product . '%')->with('category')->with('price')->paginate(10,"*","",$request->number_page)->appends($request->all());
                $firstItem=$data->firstItem();
                $lastItem=$data->lastItem();
                $total=$data->total();
                   return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
            }
        }
        else {
            if($request->category==0){
                if($request->name_product){
                    $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->where('number','<=',0)->where('name','like', '%' .$request->name_product . '%')->with('category')->with('price')->paginate(10)->appends($request->all());
                   $firstItem=$data->firstItem();
                   $lastItem=$data->lastItem();
                   $total=$data->total();
                   return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
                }
                else {
                   $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->where('number','<=',0)->with('category')->with('price')->paginate(10)->appends($request->all());
                   $firstItem=$data->firstItem();
                   $lastItem=$data->lastItem();
                   $total=$data->total();
                   return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
                }
            }
            else{
              $data= $this->Product_value->where('id_company_child',Session::get('id_company_child'))->where('id_category',$request->category)->where('number','<=',0)->where('name','like', '%' .$request->name_product . '%')->with('category')->with('price')->paginate(10)->appends($request->all());
                   $firstItem=$data->firstItem();
                   $lastItem=$data->lastItem();
                   $total=$data->total();
                   return response()->json(['data'=>$data,'firstItem'=> $firstItem,'lastItem'=>$lastItem,'total'=>$total]);
            }
        }
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
    public function store(ProductRequest $request)
    {   
             
            if($request->Ma_sp){

                $this->Product_value->Ma_sp=$request->Ma_sp;
            }
            else {
               $data=$this->Product_value->withTrashed()->where("id_company_child",Session::get('id_company_child'))->get();
                $this->Product_value->Ma_sp= $this->function_auto->code_auto("SP",$data);
            }
            $this->Product_value->name=$request->name;
            if($request->price_sell){
                 $this->Price_value->price_sell=$request->price_sell;
            }
            if($request->price_import)
            {
                $this->Price_value->price_import=$request->price_import;
            }
            if($request->number){
                 $this->Product_value->number=$request->number;
            }
            $this->Price_value->save();
            $this->Product_value->id_price=$this->Price_value->id;
            $this->Product_value->id_category=$request->id_category;
            $this->Product_value->id_dvt=$request->id_dvt;
            if($request->file("image")){
                 $this->Product_value->image = "storage/app/".Storage::putFile('public', $request->file('image'));
            }
            else {
             $this->Product_value->image="storage/app/public/default.jpg";
            }
            $id_company_child=Session::get('id_company_child');
            $this->Product_value->id_company_child= $id_company_child[0];
            $this->Product_value->save();


            return response()->json(['success'=>"Thêm mới sản phẩm
             thành công"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=$this->Product_value->withTrashed()->with('category')->with('price')->with('unit')->findOrFail($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=$this->Product_value->withTrashed()->with('category')->with('price')->findOrFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {     
          
        $Product_id=$this->Product_value->withTrashed()->find($id);
        $Product_id->name=$request->name;
        if($request->price_sell){
             $this->Price_value->price_sell=$request->price_sell;
        }
        if($request->price_import)
        {
            $this->Price_value->price_import=$request->price_import;
        }
        $this->Price_value->save();
        $Product_id->id_price=$this->Price_value->id;
         
        $Product_id->id_category=$request->id_category;
        $Product_id->id_dvt=$request->id_dvt;
        if($request->file("image")){
            $Product_id->image = "storage/app/".Storage::putFile('public', $request->file('image'));
            }
        $Product_id->update();
          
        return response()->json(['success'=>"Cập nhật sản phẩm thành công"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->Product_value->find($id)->delete();
        return response()->json(['success'=>"Xóa sản phẩm thành công"]);
    }
    public function SetStatusProduct($id){
        $data=$this->Product_value->find($id);
        if($data->status==0){
            $data->status=1;
        }
        else {
            $data->status=0;
        }
        $data->save();
    }
    public function RestoreDeleteProduct($id){
      $data=$this->Product_value->onlyTrashed()->find($id);
      $data->restore();
    }
    public function ForceDeleteProduct($id){
        $this->Product_value->onlyTrashed()->find($id)->forceDelete();
        return response()->json(['success'=>"Xóa sản phẩm vĩnh viễn thành công"]);
    }
    
}

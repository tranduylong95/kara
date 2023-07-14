<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

      $this->Category_value=new Category;
    }
    public function index()
    {
        $all_category=json_decode($this->Category_value->where('id_company_child',Session::get('id_company_child'))->get());
        return response()->json($all_category);
        //return csrf_token();
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
           
   
       // Retrieve a portion of the validated input data...
        $id_company_child=Session::get('id_company_child');
         $this->Category_value->name=$request->name;
         $this->Category_value->id_company_child=$id_company_child[0];
         $this->Category_value->save();
         return response()->json(['success'=>"Thêm mới danh mục thành công"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Category_id=$this->Category_value->findOrFail($id);
        return redirect('/category');
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
          $Category_id=$this->Category_value->findOrFail($id);
          $Category_id->name=$request->name;
          $Category_id->update();
          return redirect('/Unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category_id=$this->Category_value->findOrFail($id)->delete();
        return redirect('/category');
    }
   
}

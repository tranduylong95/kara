<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit ;
use Session;
class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

      $this->Unit_value=new Unit;
    }
    public function index()
    {
        return $this->Unit_value->where('id_company_child',Session::get('id_company_child'))->get();
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
    {   $id_company_child=Session::get('id_company_child');
        $this->Unit_value->name=$request->name;
        $this->Unit_value->id_company_child=$id_company_child[0];
        $this->Unit_value->save();
        return response()->json(['success'=>"Thêm mới đơn vị tính thành công"]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit($id)
    {
        $Unit_id=$this->Unit_value->findOrFail($id);
        return $Unit_id->name;
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
          $Unit_id=$this->Unit_value->findOrFail($id);
          $Unit_id->name=$request->name;
          $Unit_id->update();
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
        $Unit_id=$this->Unit_value->findOrFail($id)->delete();
        return redirect('/Unit');
    }
}

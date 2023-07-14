@extends('layouts.master')
@section('content')
        <div class="form-inline" >
			<div class="form-group" >
                <select class="form-control" >
	                <option value="0">Chọn Khu vực</option>
	                @foreach($data_area as $value)
					<option value="{{$value->id}}">{{$value->name}}</option>
					`@endforeach
                </select>
            </div>
            <div class="form-group" >
               <div style="display: flex;">
               <input type="text" name="" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
               <button class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>Tìm</button>
               </div>
            </div>
            
            <div  class="form-group  text-right">
            	<button class="btn btn-primary"  data-toggle="modal" data-target="#room" onclick="list_area()">&nbsp;Quản lý khu vực</button>
            	<button class="btn btn-primary" onclick="create_room_FE()">&nbsp;Tạo Phòng</button>
            </div>
        </div>
        <div class="content" >
        	<div class="breadcrumb" style="display: none;">
				<a  onclick="close_create_room_FE()">
                <i class="fa fa-arrow-left"></i>
			    Quay lại
				</a>
				<span style="font-size: 14px; font-weight: 500; display: inline-block; padding: 5px;color: #337ab7">Phòng</span>
			</div>
			<div class="form_s1 " style="margin-top: 20px; display: none;" id="form_room">
				<div class="row">
					<div class="col-lg-12 row" style="border-bottom:1px solid #eee;">
						<div class="col-lg-6">
							<div class="pd-2">
								<span>Thông tin phòng</span>
							</div>
						</div>
						<div class="col-lg-6 text-right" style="margin-top: auto; margin-bottom: auto;">
							<button class="btn btn-primary" style="padding: 5px 20px 5px 20px;" onclick="save_room()">Lưu phòng</button>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group row" style="padding-left:20px; padding-top:20px;margin-bottom: 15px;">
							<label class="col-lg-3 col-form-label">Tên phòng</label>
							<div class="col-lg-5"> 
								<input type="text" name="NameRoom" class="form-control">
								<div style="color: red;font-size: 15px;display: none;">Trường này không được để trống</div>
							</div>
						</div>
						<div style="display: none;" id="form_price_time">
							<div class="form-group row" style="padding-left: 20px; margin-bottom: 15px;">
										    <label  class="col-sm-3 col-form-label " style="font-size: 15px;">Đơn giá giờ 1</label>
										    <div class="col-sm-8 d-flex">
										      <input type="text"  class="form-control text-center" value="0" disabled style="max-width: 42px; font-size: 14px;">
										       <label  class="col-form-label text-right" style="font-size: 15px;">đến</label>
										      <input type="text"  class="form-control text-center" value="8" disabled style="max-width: 42px;font-size: 14px;" >
										      <input type="text" name="Price_Time_1_Form" class="form-control" placeholder="nhập đơn giá giờ" >
										    </div>
							</div>
							<div class="form-group row" style="padding-left: 20px; margin-bottom: 15px;">
										    <label  class="col-sm-3 col-form-label " style="font-size: 15px;">Đơn giá giờ 2</label>
										    <div class="col-sm-8 d-flex">
										      <input type="text"  class="form-control text-center" value="8" disabled style="max-width: 42px; font-size: 14px;">
										       <label  class="col-form-label text-right" style="font-size: 15px;">đến</label>
										      <input type="text"  class="form-control text-center" value="16" disabled style="max-width: 42px;font-size: 14px;" >
										      <input type="text" name="Price_Time_2_Form" class="form-control" placeholder="nhập đơn giá giờ" >
										    </div>
							</div>
							<div class="form-group row" style="padding-left: 20px; margin-bottom: 15px;">
										    <label  class="col-sm-3 col-form-label " style="font-size: 15px;">Đơn giá giờ 3</label>
										    <div class="col-sm-8 d-flex">
										      <input type="text"  class="form-control text-center" value="16" disabled style="max-width: 42px; font-size: 14px;">
										       <label  class="col-form-label text-right" style="font-size: 15px;">đến</label>
										      <input type="text"  class="form-control text-center" value="24" disabled style="max-width: 42px;font-size: 14px;" >
										      <input type="text" name="Price_Time_3_Form" class="form-control" placeholder="nhập đơn giá giờ" >
										    </div>
							</div>
					    </div>
									
				    </div>
				    <div class="col-lg-6">
						<div class="form-group row" style="padding: 20px;">
							<label class="col-lg-3 col-form-label">Khu Vực</label>
							<div class="col-lg-5"> 
								<select class="form-select" id="select_area">
									@foreach($data_area as $value)
									<option value="{{$value->id}}">{{$value->name}}</option>
									@endforeach
							    </select>
							</div>
						</div>
				    </div>
				</div>
			</div>
        	<div class="list_item_table mr-t1 pd-2 mr-t20" style="background-color: #FFF ; " id="list_room">
        		 <table class="table">
	        		 	<thead class="thead-light" style="background-color: #0d6efd47">
							<tr>
								<th>Tên phòng</th>
								<th class="text-center">Khu vực</th>
								<th class="text-center">Tình trạng</th>
								<th class="text-center">Ngày khởi tạo</th>
								<th class="text-center">Thao Tác</th>
							</tr>
						</thead> 
						<tbody>
							@foreach($data as $value)
							<tr>
								<td>{{$value->name}}</td>
								<td class="text-center">{{$value->area->name}}</td>
								<td class="text-center">Phòng trống</td>
								<td class="text-center">{{$value->create_at}}</td>
								<td class="text-center">
									<i class="fa fa-pencil-square-o href" style="color: #2a6496;cursor: pointer;" onclick="find_edit_room({{$value->id}})"></i>
									@if(Auth::user()->rank==0)
									<i class="fa fa-trash href" style="color: #2a6496;cursor: pointer;" onclick="delete_room({{$value->id}})"></i>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot >
						<tr>
		                    <td colspan="100">
	                        <div class="row">
	                            <div class="col-md-4 col-xs-6 mt10">
	                                <p> Kết quả từ {{$data->firstItem()}}-{{$data->lastItem()}} trên tổng {{$data->total()}}</p>
	                            </div>
	                            <div class="col-md-8 col-xs-6 text-right">
	                                <nav aria-label="Page navigation">
	                                	@if ($data->hasPages())
		                                	<ul class="pagination justify-content-end">
		                                		@if(!$data->onFirstPage())
											    <li class="page-item">
											      <a class="page-link" href="{{$data->previousPageUrl()}}" tabindex="-1"><<</a>
											    </li>
											    @endif
											    <?php
											        $start = $data->currentPage() - 2; // show 3 pagination links before current
											        $end = $data->currentPage() + 2; // show 3 pagination links after current
											        if($start < 1) {
											            $start = 1; // reset start to 1
											            $end += 1;
											        } 
											        if($end >= $data->lastPage()) $end = $data->lastPage(); // reset end to last page
											    ?>
											    @if($start > 1)
											        <li class="page-item">
											            <a class="page-link" href="{{ $data->url(1) }}">{{1}}</a>
											        </li>
											        @if($data->currentPage() != 4)
											            {{-- "Three Dots" Separator --}}
											            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
											        @endif
											    @endif
											        @for ($i = $start; $i <= $end; $i++)
											            <li class="page-item {{ ($data->currentPage() == $i) ? ' active' : '' }}">
											                <a class="page-link"  href="{{ $data->url($i) }}" >{{$i}}</a>
											            </li>
											        @endfor
											    @if($end < $data->lastPage())
											        @if($data->currentPage() + 3 != $data->lastPage())
											            {{-- "Three Dots" Separator --}}
											            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
											        @endif
											        <li class="page-item">
											            <a class="page-link"  href="{{ $data->url($data->lastPage()) }}">{{$data->lastPage()}}</a>
											        </li>
											    @endif
											    @if($data->currentPage()!=$data->lastPage())
											    <li class="page-item">
											      <a class="page-link" href="{{$data->nextPageUrl()}}" >>></a>
											    </li>
											    @endif
											</ul>
										@endif
									</nav>		        
	                           </div>
	                        </div>
	                    </td>
	                     </tr>
					    </tfoot>
        		 </table>
        	</div>
        	<div class="modal fade" id="room" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h6 class="modal-title" id="exampleModalLongTitle">Quản lý khu vực</h6>
				        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				      	<div style="background-color: #EFF3F8; padding-left: 20px;padding-top: 10px;">
				      		<button class="btn" style="border-radius: 0px; background-color: #fff;" onclick="list_area()">
				      			<i class="fa fa-list"></i>
				      			Danh sách khu vực 
				      		</button>
				      		<button class="btn" style="border-radius: 0px; background-color: #EFF3F8;" onclick="form_area_FE()">
				      			<i class="fa fa-list" ></i>
				      			Tạo mới khu vực
				      		</button>
				      	</div>
				      	<div style=" padding: 15px; border :1px solid #ddd; border-top: 0px; ">
					        <table class="table list_small" style="display: table;" id="list_area" >
					        	<thead class="thead-light" style="background-color: #FFf;">
									<tr>
										<td>Tên khu vực</td>
										<td class="text-center">Số phòng</td>
										<td class="text-center">Đơn giá giờ</td>
										<td class="text-center">Tên chi nhánh</td>
										<td class="text-center" style="width: 25px;"></td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td class="text-center">10</td>
										<td class="text-center">	
											0g đến 24g giá 250,000đ
											<br>
											0g đến 0g giá 0đ
											<br>
											0g đến 24g giá 0 đ</td>
										<td class="text-center">
                                            Chinh nhanh 1
										</td>
										<td class="text-center">
											<i class="fa fa-trash href" style="color: #2a6496;cursor: pointer;" aria-hidden="true"></i>
										</td>
									</tr>
								</tbody>
					        </table>
                         
					        <form style="display: none;" id="form_area">
						        	<div class="form-group row " style="margin-bottom: 15px;">
									    <label  class="col-sm-4 col-form-label text-right" style="font-size: 15px;">Tên Khu vực</label>
									    <div class="col-sm-8">
									      <input type="text" name="NameArea" class="form-control" >
									      <div class="error"style="color: red; font-size: 14px;display: none;">Trường này không được để trống</div>
									    </div>
									</div>
									<div class="form-group row" style="margin-bottom: 15px;">
									    <label  class="col-sm-4 col-form-label text-right" style="font-size: 15px;">Số phòng </label>
									    <div class="col-sm-8">
									      <input type="number"  class="form-control" name="NumberRoom" >
									    </div>
									</div>
									<div class="form-group row" style="margin-bottom: 15px;">
									    <label  class="col-sm-4 col-form-label text-right" style="font-size: 15px;">Đơn giá giờ 1</label>
									    <div class="col-sm-8">
									    <div class="d-flex">
									      <input type="text"  class="form-control text-center" value="0" disabled style="max-width: 42px; font-size: 14px;">
									       <label  class="col-form-label text-right" style="font-size: 15px;">đến</label>
									      <input type="number"  class="form-control text-center" value="8" disabled style="max-width: 42px;font-size: 14px;" >
									      <input type="number" name="Price_Time_1" class="form-control" placeholder="nhập đơn giá giờ" >
									    </div>
									    <div class="error"style="color: red; font-size: 14px;display: none;">Trường này không được để trống</div>
									    </div>
									</div>
									<div class="form-group row" style="margin-bottom: 15px;">
									    <label  class="col-sm-4 col-form-label text-right" style="font-size: 15px;">Đơn giá giờ 2</label>
									    <div class="col-sm-8">
										    <div class="d-flex">
										      <input type="text"  class="form-control text-center" value="8" disabled style="max-width: 42px;font-size: 14px;">
										       <label  class="col-form-label text-right" style="font-size: 15px;">đến</label>
										      <input type="text"  class="form-control text-center" value="16" disabled style="max-width: 42px;font-size: 14px;" >
										      <input type="number"  class="form-control" placeholder="nhập đơn giá giờ" name="Price_Time_2">
										    </div>
										    <div class="error"style="color: red; font-size: 14px;display: none;">Trường này không được để trống</div>
									    </div>
									</div>
									<div class="form-group row" style="margin-bottom: 15px;">
									    <label  class="col-sm-4 col-form-label text-right" style="font-size: 15px;">Đơn giá giờ 3</label>
									    <div class="col-sm-8 ">
									      <div class="d-flex">
									      <input type="text"  class="form-control" value="16" disabled style="max-width: 42px;font-size: 14px;">
									       <label  class="col-form-label text-right" style="font-size: 15px;">đến</label>
									      <input type="text"  class="form-control" value="24" disabled style="max-width: 42px;font-size: 14px;" >
									      <input type="number"  class="form-control" placeholder="nhập đơn giá giờ" name="Price_Time_3" >
									    </div>
									    <div class="error"style="color: red; font-size: 14px;display: none;">Trường này không được để trống</div>
									    </div>
									</div>
									<div class="form-group row">
										<div class="col-sm-8 offset-sm-4">
										  	<button type ="button"class="btn-primary btn" onclick="save_area()">Lưu</button>
										  	<button type ="button" class="btn btn-primary" onclick="save_area_continue()">Lưu và tiếp tục</button>
										</div>
									</div>
					        </form>
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn" data-dismiss="modal" style="border-color:#adadad;font-size: 13px;">
				        	<i class="fa fa-undo"></i>Đóng</button>
				      </div>
				    </div>
			  </div>
			</div>
        </div>
<script type="text/javascript">
	function create_room_FE() {
		let x =document.getElementsByClassName('form-inline');
		x[0].style.display="none";
		let y =document.getElementsByClassName('breadcrumb');
		y[0].style.display="block";
		let z= document.getElementsByClassName('list_item_table');
		z[0].style.display="none";
		let f= document.getElementsByClassName('form_s1');
		f[0].style.display="block";
		let e= document.getElementById("form_price_time");
        e.style.display="none";
		document.querySelector('[name="NameRoom"]').value="";
	    document.querySelector('[name="Price_Time_1_Form"]').value="";
	    document.querySelector('[name="Price_Time_2_Form"]').value="";
	    document.querySelector('[name="Price_Time_3_Form"]').value="";
	    let options_area=document.getElementById("select_area").children;
	    options_area[0].selected=true;
	    let button=f[0].getElementsByTagName('button');
	    button[0].setAttribute("onclick","save_room()");
	    button[0].textContent="Lưu phòng";
	}
	function close_create_room_FE(){
        let x =document.getElementsByClassName('form-inline');
		x[0].style.display="block";
		let y =document.getElementsByClassName('breadcrumb');
		y[0].style.display="none";
		let z= document.getElementsByClassName('list_item_table');
		z[0].style.display="block";
		let f= document.getElementsByClassName('form_s1');
		f[0].style.display="none";
		document.querySelector('[name="NameRoom"]').nextElementSibling.style.display="none";
	}
	function list_area(){
       let x =document.getElementById('list_area');
       x.style.display="table";
       let y=document.getElementById('form_area');
       y.style.display="none";
       
       $.ajax({
			type:'get',
			url:'room/ListArea',
	        success: function (data) {
				let z=x.getElementsByTagName('tbody');
				while (z[0].hasChildNodes()) {
			      z[0].removeChild(z[0].firstChild);
		        }
		        
			    for (var i =0; i <data.length; i++) {
			        	
			        	z[0].innerHTML+='<tr><td>'+data[i].name+'</td><td class="text-center">'+data[i].room.length+'</td><td class="text-center">0g đến 8g giá '+data[i].price_time.price_0_8+'đ<br>0g đến 16g giá '+data[i].price_time.price_8_16+'đ<br>16g đến 24g giá '+data[i].price_time.price_16_24+'đ</td><td class="text-center">'+data[i].company_child.name+'</td><td class="text-center"></td></tr>';
			         
			    }  
			    
			},
            error: function(data) { 
            
	    }
		});
	}
	function form_area_FE(){
	   let x =document.getElementById('list_area');
       x.style.display="none";
       let y =document.getElementById('form_area');
       y.style.display="block";
	}
	function save_area(){
		if(document.querySelector('[name="NameArea"]').value==''){
			document.querySelector('[name="NameArea"]').nextElementSibling.style.display="block";
		}
		if(document.querySelector('[name="NameArea"]').value!=''){
			document.querySelector('[name="NameArea"]').nextElementSibling.style.display="none";
		}
		if(document.querySelector('[name="Price_Time_1"]').value==''){
           	document.querySelector('[name="Price_Time_1"]').parentElement.nextElementSibling.style.display="block";
		}
		if(document.querySelector('[name="Price_Time_1"]').value!=''){
           	document.querySelector('[name="Price_Time_1"]').parentElement.nextElementSibling.style.display="none";
		}
		if(document.querySelector('[name="Price_Time_2"]').value==''){
           document.querySelector('[name="Price_Time_2"]').parentElement.nextElementSibling.style.display="block";
		}
		if(document.querySelector('[name="Price_Time_2"]').value!=''){
           document.querySelector('[name="Price_Time_2"]').parentElement.nextElementSibling.style.display="none";
		}
		if(document.querySelector('[name="Price_Time_3"]').value==''){
           	document.querySelector('[name="Price_Time_3"]').parentElement.nextElementSibling.style.display="block";
		}
		if(document.querySelector('[name="Price_Time_3"]').value!=''){
           	document.querySelector('[name="Price_Time_3"]').parentElement.nextElementSibling.style.display="none";
		}
		if(document.querySelector('[name="NameArea"]').value!=''&&document.querySelector('[name="Price_Time_1"]').value!=''&&document.querySelector('[name="Price_Time_2"]').value!=''&&document.querySelector('[name="Price_Time_3"]').value!=''){
		$.ajax({
			headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		type:'POST',
		url:'room/SaveArea',
		data:{
	    	'NameArea':document.querySelector('[name="NameArea"]').value,
	    	'NumberRoom':document.querySelector('[name="NumberRoom"]').value,
	    	'Price_Time_1':document.querySelector('[name="Price_Time_1"]').value,
	    	'Price_Time_2':document.querySelector('[name="Price_Time_2"]').value,
	    	'Price_Time_3':document.querySelector('[name="Price_Time_3"]').value,
	    },
        success: function (data) {
			list_area();
			document.querySelector('[name="NameArea"]').value="";
			document.querySelector('[name="NumberRoom"]').value="";
			document.querySelector('[name="Price_Time_1"]').value="";
			document.querySelector('[name="Price_Time_2"]').value="";
			document.querySelector('[name="Price_Time_3"]').value="";
		},
		error: function(data) { 
	      console.log(data.responseJSON);    
	    }
		});
	}
	}
	function search_room($page){
	}
	function save_area_continue(){
		if(document.querySelector('[name="NameArea"]').value==''){
			document.querySelector('[name="NameArea"]').nextElementSibling.style.display="block";
		}
		if(document.querySelector('[name="NameArea"]').value!=''){
			document.querySelector('[name="NameArea"]').nextElementSibling.style.display="none";
		}
		if(document.querySelector('[name="Price_Time_1"]').value==''){
           	document.querySelector('[name="Price_Time_1"]').parentElement.nextElementSibling.style.display="block";
		}
		if(document.querySelector('[name="Price_Time_1"]').value!=''){
           	document.querySelector('[name="Price_Time_1"]').parentElement.nextElementSibling.style.display="none";
		}
		if(document.querySelector('[name="Price_Time_2"]').value==''){
           document.querySelector('[name="Price_Time_2"]').parentElement.nextElementSibling.style.display="block";
		}
		if(document.querySelector('[name="Price_Time_2"]').value!=''){
           document.querySelector('[name="Price_Time_2"]').parentElement.nextElementSibling.style.display="none";
		}
		if(document.querySelector('[name="Price_Time_3"]').value==''){
           	document.querySelector('[name="Price_Time_3"]').parentElement.nextElementSibling.style.display="block";
		}
		if(document.querySelector('[name="Price_Time_3"]').value!=''){
           	document.querySelector('[name="Price_Time_3"]').parentElement.nextElementSibling.style.display="none";
		}
		if(document.querySelector('[name="NameArea"]').value!=''&&document.querySelector('[name="Price_Time_1"]').value!=''&&document.querySelector('[name="Price_Time_2"]').value!=''&&document.querySelector('[name="Price_Time_3"]').value!=''){
		$.ajax({
			headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		type:'POST',
		url:'room/SaveArea',
		data:{
	    	'NameArea':document.querySelector('[name="NameArea"]').value,
	    	'NumberRoom':document.querySelector('[name="NumberRoom"]').value,
	    	'Price_Time_1':document.querySelector('[name="Price_Time_1"]').value,
	    	'Price_Time_2':document.querySelector('[name="Price_Time_2"]').value,
	    	'Price_Time_3':document.querySelector('[name="Price_Time_3"]').value,
	    },
        success: function (data) {
        	
			document.querySelector('[name="NameArea"]').value="";
			document.querySelector('[name="NumberRoom"]').value="";
			document.querySelector('[name="Price_Time_1"]').value="";
			document.querySelector('[name="Price_Time_2"]').value="";
			document.querySelector('[name="Price_Time_3"]').value="";
		},
		error: function(data) { 
	      console.log(data);    
	    }
		});
	  }
	}
	function save_room(){
		if(document.querySelector('[name="NameRoom"]').value==''){
			document.querySelector('[name="NameRoom"]').nextElementSibling.style.display="block";
		}
		if(document.querySelector('[name="NameRoom"]').value!=''){
			document.querySelector('[name="NameRoom"]').nextElementSibling.style.display="none";
			$.ajax({
			headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		type:'POST',
		url:'room/SaveRoom',
		data:{
	    	'name':document.querySelector('[name="NameRoom"]').value,
	    	'select_area':document.getElementById('select_area').value,
	    	
	    },
        success: function (data) {
        	let x =document.getElementsByClassName('form-inline');
		x[0].style.display="block";
		let y =document.getElementsByClassName('breadcrumb');
		y[0].style.display="none";
		let z= document.getElementsByClassName('list_item_table');
		z[0].style.display="block";
		let f= document.getElementsByClassName('form_s1');
		f[0].style.display="none";
		let e= document.getElementById("form_price_time");
        e.style.display="block";
		document.querySelector('[name="NameRoom"]').value="";
	    document.querySelector('[name="Price_Time_1_Form"]').value="";
	    document.querySelector('[name="Price_Time_2_Form"]').value="";
	    document.querySelector('[name="Price_Time_3_Form"]').value="";
	    let options_area=document.getElementById("select_area").children;
	    options_area[0].selected=true;
	    let button=f[0].getElementsByTagName('button');
	    button[0].setAttribute("onclick","save_room()");
	    button[0].textContent="Lưu phòng";
			
		},
		error: function(data) { 
	      console.log(data);    
	    }
		});
		}
		
	}
    function find_edit_room(id){
            
       $.ajax({
			type:'get',
			url:'room/show/'+id,
	        success: function (data) {
             let x=document.getElementById('list_room');
             x.style.display="none";
             let y =document.getElementById('form_room');
             y.style.display="block";
             let z=document.getElementsByClassName('form-inline');
             z[0].style.display="none";
             let f = document.getElementsByClassName('breadcrumb');
             f[0].style.display="block";
             document.querySelector('[name="NameRoom"]').value=data.name;
             let e= document.getElementById("form_price_time");
             e.style.display="block";
             document.querySelector('[name="Price_Time_1_Form"]').value=data.price_time_room.price_0_8;
             document.querySelector('[name="Price_Time_2_Form"]').value=data.price_time_room.price_8_16;
             document.querySelector('[name="Price_Time_3_Form"]').value=data.price_time_room.price_16_24;
             let button=y.getElementsByTagName('button');
			 button[0].setAttribute("onclick","update_room("+id+")");
			 button[0].textContent="Cập Nhập";
			 let options_area=document.getElementById("select_area").children;
                    for (var i = 0; i < options_area.length; i++){
                      if (options_area[i].value==data.id_area){
                          options_area[i].selected=true;
                      }
                    }
			},
            error: function(data) { 
	      console.log(data);    
	    }
		});
	}
	function update_room(id){
		$.ajax({
			headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		type:'POST',
		url:'room/'+id,
		data:{
	    	'name':document.querySelector('[name="NameRoom"]').value,
	    	'select_area':document.getElementById('select_area').value,
	    	'Price_Time_1': document.querySelector('[name="Price_Time_1_Form"]').value,
	    	'Price_Time_2': document.querySelector('[name="Price_Time_2_Form"]').value,
	    	'Price_Time_3': document.querySelector('[name="Price_Time_3_Form"]').value,
	    },
        success: function (data) {
        	close_create_room_FE();
			
		},
		error: function(data) { 
	      console.log(data);    
	    }
		});
	}
	function delete_room(id){
      let text="Bạn có thực muốn phòng này không";
		if(confirm(text) == true){
	        $.ajax({
				headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
			type:'DELETE',
			url:'room/delete/'+id,
	        success: function (data) {
				console.log(1);
			},
			error: function(data) { 
		      console.log(data);    
		    }
			});
		}
	}
</script>
@endsection
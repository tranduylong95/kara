@extends('layouts.master')
@section('content')
    <div class="form-inline" style="display: block;">
		<div class="form-group" >
            <select class="form-control" id="txt_search_status">
                <option value="1">Đang kinh doanh</option>
                <option value="0">Đã ngừng kinh doanh</option>
                <option value="2">Đã xóa</option>
                <option value="3">Còn hàng</option>
                <option value="4">Hết hàng</option>
            </select>
        </div>
        <div class="form-group"class="form-control" >
            <select class="form-control" id="txt_search_category">
                <option value="0">Tất cả</option>
                @foreach($data_category as $value)
				<option value="{{$value->id}}">{{$value->name}}</option>
				@endforeach
            </select>
        </div>
        <div class="form-group"class="form-control"  >
          <input type="text" name="txt_search_name_product" class="form-control" placeholder="Tìm Kiếm Hàng Hóa">
        </div>
        <div class="form-group" >
        	<button class="btn btn-primary" onclick="search_product()"><i class="fa fa-search"></i>&nbsp;Tìm Kiếm</button>
        </div>
        <div class="form-group">
        	<button class="btn btn-primary" onclick="save_product_FE()">Thêm mới</button>
        </div>
       
	</div>
	<div class="content" style="position: relative;">
		<div class="breadcrumb" style="display: none;" >
			<a  style="cursor: pointer;" onclick="list_product_FE()">
            <i class="fa fa-arrow-left"></i>
		     Hàng Hóa
			</a>
			<span style="font-size: 14px; font-weight: 500; display: inline-block; padding: 5px;color: #337ab7">Thêm mới</span>
		</div>
		<div class="form_s1 " style="margin-top: 20px; display: none;">
			<div class="row">
				<div class="col-lg-12 row" style="border-bottom:1px solid #eee; margin-bottom: 15px;">
					<div class="col-lg-6">
						<div class="pd-2">
							<span>Thông tin sản phẩm</span>
							<span style="color: #c3bebe">Các thông tin chi tiết sản phẩm</span>
						</div>
					</div>
					<div class="col-lg-6 text-right" style="margin: auto;">
						<button class="btn btn-primary" style="padding: 5px 20px 5px 20px;" onclick="save_product()">Lưu sản phẩm</button>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="col-lg-12" style="padding-left: 15px;
					padding-right: 15px;">
						<div class="form-group row mr-b1">
								<label class="col-lg-3">Tên sản phâm (*)</label>
								<div class="col-lg-9">
									<input type="text" name="name" class="form-control">
								</div>
						</div>
						<div class="form-group row mr-b1">
								<label class="col-lg-3">Danh mục</label>
								<div class="col-lg-9" style="display: flex;">
									<select class="form-select" id="select_category">
										@foreach($data_category as $value)
										  <option value="{{$value->id}}">{{$value->name}}</option>
										@endforeach
									</select>
									<button class="btn btn-primary" data-toggle="modal" data-target="#category" onclick="list_category(this)">...</button>
								</div>
						</div>
						<div class="form-group row mr-b1">
								<label class="col-lg-3">Giá bán lẻ</label>
								<div class="col-lg-9">
									<input type="text" name="txtNamePrice" class="form-control text-right" placeholder="0"  onkeydown="txt_number_key(event)" onkeyup="txt_number_value(this)">
								</div>
						</div>	
						<div class="form-group row mr-b1">
								<label class="col-lg-3">Giá nhập</label>
								<div class="col-lg-9">
									<input type="text" name="txtNameImport" class="form-control text-right" placeholder="0" onkeydown="txt_number_key(event)" onkeyup="txt_number_value(this)">
								</div>
						</div>
						<div class="form-group row mr-b1">
								<label class="col-lg-3">Tồn kho ban đầu</label>
								<div class="col-lg-9">
									<input type="text" name="txtNameNumber" class="form-control text-right" placeholder="0" onkeydown="txt_number_key(event)" onkeyup="txt_number_value(this)">
								</div>
						</div>
					</div>	
				</div>
				<div class="col-lg-6">
					<div class="col-lg-12" style="padding-left: 15px;
					padding-right: 15px;">
					    <div class="form-horizontal">
							<div class="form-group row mr-b1">
								<label class="col-lg-3">Mã sản phẩm</label>
								<div class="col-lg-9">
									<input type="text" name="code_Product" class="form-control">
									<div class="error" style="font-size: 13px;color: red;"></div>
								</div>
							</div>
							<div class="form-group row mr-b1">
									<label class="col-lg-3">Đơn vị tính</label>
									<div class="col-lg-9" style="display: flex;">
										<select class="form-select" id="select_unit">
										@foreach($data_unit as $value)
										  <option value="{{$value->id}}">{{$value->name}}</option>
										@endforeach
										</select>
										<button class="btn-primary btn" data-toggle="modal" data-target="#unit" onclick="list_unit()">...</button>
									</div>
							</div>
							
					    </div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="text-center mr-b1">
						<img src="karaoke.jpg" style="width: 90px; height: 90px;" id="upload_file_image">
					</div>
					<div class="form-group text-center mr-b1">
						<input type="file" name="file" onchange="upload_file(this)" id="input-file-image">
					</div>
				</div>
			</div>
		</div>
		<div class="list_item_table mr-t1 pd-2" style="background-color: #FFF ; display:block;">
		    <table class="table" id="list_table_product">
				<thead class="thead-light" style="background-color: #0d6efd47">
					<tr>
						<th><i class="fa fa-picture-o"></i></th>
						<th>Tên Hàng Hóa</th>
						<th class="text-center">Danh Mục</th>
						<th class="text-center">Có thể bán</th>
						<th class="text-center">Trạng thái</th>
						<th class="text-center">Ngày khởi tạo</th>
						<th class="text-center">Thao Tác</th>
					</tr>
				</thead>  
				<tbody>
					@foreach($data_product as $value)
					<tr>
						<td><img src="{{$value->image}}" style="height: 30px;"></td>
						<td><p style="color: #2a6496; cursor: pointer;" onclick="find_edit_product({{$value->id}})">{{$value->name}}</p></td>
						<td class="text-center">
							<p>{{$value->category->name}}</p>
							<span style="background-color: red; color: #fff; display: inline-block; padding: 5px;">{{$value->Ma_sp}}</span>
						</td>
						<td class="text-center">
							<p style="color: #2a6496;">{{$value->number}}</p>
							<span>Giá nhập:  {{$value->price->price_import}}đ</span>
						</td>
						<td class="text-center">
							@if($value->status==1)
								<i class="fa fa-circle complete" style="color: green;"></i> Đang giao dịch
						    @else
                                <i class="fa fa-circle complete" style="color: red;"></i> Ngừng giao dịch
						    @endif
						</td>
						<td class="text-center">{{$value->create_up}}</td>
						<td class="text-center">
							<i class="fa fa-pause href" style="color: #2a6496;cursor: pointer;"onclick="pause_status_proudct(1,{{$value->id}})"></i>
						<i class="fa fa-trash href" style="color: #2a6496;cursor: pointer;" onclick="delete_product(1,{{$value->id}})"></i>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot >
					<tr>
	                    <td colspan="100">
	                        <div class="row">
	                            <div class="col-md-4 col-xs-6 mt10">
	                                <p>Kết quả từ {{$data_product->firstItem()}}-{{$data_product->lastItem()}} trên tổng {{$data_product->total()}}</p>
	                            </div>
	                            <div class="col-md-8 col-xs-6 text-right">
	                                <nav aria-label="Page navigation">
	                                	@if ($data_product->hasPages())
		                                	<ul class="pagination justify-content-end">
		                                		@if(!$data_product->onFirstPage())
											    <li class="page-item">
											      <a class="page-link" href="#" tabindex="-1"><<</a>
											    </li>
											    @endif
											    <?php
											        $start = $data_product->currentPage() - 2; // show 3 pagination links before current
											        $end = $data_product->currentPage() + 2; // show 3 pagination links after current
											        if($start < 1) {
											            $start = 1; // reset start to 1
											            $end += 1;
											        } 
											        if($end >= $data_product->lastPage() ) $end = $data_product->lastPage(); // reset end to last page
											    ?>
											    @if($start > 1)
											        <li class="page-item">
											            <a class="page-link" onclick="search_product(1)">{{1}}</a>
											        </li>
											        @if($data_product->currentPage() != 4)
											            {{-- "Three Dots" Separator --}}
											            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
											        @endif
											    @endif
											        @for ($i = $start; $i <= $end; $i++)
											            <li class="page-item {{ ($data_product->currentPage() == $i) ? ' active' : '' }}">
											                <a class="page-link" onclick="search_product({{$i}})">{{$i}}</a>
											            </li>
											        @endfor
											    @if($end < $data_product->lastPage())
											        @if($data_product->currentPage() + 3 != $data_product->lastPage())
											            {{-- "Three Dots" Separator --}}
											            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
											        @endif
											        <li class="page-item">
											            <a class="page-link"  onclick="search_product({{$data_product->lastPage()}})">{{$data_product->lastPage()}}</a>
											        </li>
											    @endif
											    @if($data_product->currentPage()!=$data_product->lastPage())
											    <li class="page-item">
											      <a class="page-link" onclick="search_product({{$data_product->currentPage()+1}})">>></a>
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
		<div class="alert" style="display: none; opacity: 1;">
				<div style="font-size:20px; color: white; font-weight: 400;">Thông Báo</div>
				<span id="alert_2"style="font-size:14px; color: white;">Tạo danh mục thành công</span>
		</div>
	</div>
    <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h6 class="modal-title" id="exampleModalLongTitle">Quản lý danh mục</h6>
			        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div  class="modal-header-bar">
			      		<button class="btn" style="border-radius: 0px; background-color: #fff;" onclick="list_category()">
			      			<i class="fa fa-list"></i>
			      			Danh sách danh mục
			      		</button>
			      		<button class="btn"  style="border-radius: 0px; background-color: #EFF3F8;" onclick="form_category(this)">
			      			<i class="fa fa-list"></i>
			      			Tạo mới loại hàng hóa
			      		</button>
			      	</div>
			      	<div style=" padding: 15px; border :1px solid #ddd; border-top: 0px; ">
				        <table class="table list_small" id="list_category" >
				        	<thead class="thead-light" style="background-color: #FFf;">
								<tr>
									<td>ID</td>
									<td class="text-center">Danh Mục</td>
									<td class="text-center" style="width: 80px;"></td>
								</tr>
							</thead>
							<tbody>
							</tbody>
				        </table>
				        <form id="form-category" style="display: none;">
				        	<div class="form-group row " style="margin-bottom: 15px;">
							    <label  class="col-sm-4 col-form-label text-right" style="font-size: 15px;">Tên danh mục</label>
							    <div class="col-sm-8">
							      <input type="text" name="name" class="form-control" id="txtNameCategory">
							      <div style="color: red;font-size: 15px;display:none;">Trường này không được để trống</div>
							    </div>
							  </div>
							  <div class="form-group row">
								  <div class="col-sm-8 offset-sm-4">
								  	<button class="btn-primary btn" onclick="save_category(this)" type="button" >Lưu</button>
								  	<button class="btn btn-primary" type="button" onclick="save_category_continue(this)">Lưu và tiếp tục</button>
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
	<div class="modal fade" id="unit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h6 class="modal-title" id="exampleModalLongTitle">Quản lý đơn vị tính</h6>
			        <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<div  class="modal-header-bar">
			      		<button class="btn" style="border-radius: 0px; background-color: #fff;" onclick="list_unit()">
			      			<i class="fa fa-list"></i>
			      			Danh sách đơn vị tính
			      		</button>
			      		<button class="btn"  style="border-radius: 0px; background-color: #EFF3F8;" onclick="form_unit(this)">
			      			<i class="fa fa-list"></i>
			      			Tạo mới đơn vị tính
			      		</button>
			      	</div>
			      	<div style=" padding: 15px; border :1px solid #ddd; border-top: 0px; ">
				        <table class="table list_small" id="list_unit" >
				        	<thead class="thead-light" style="background-color: #FFf;">
								<tr>
									<td>ID</td>
									<td class="text-center">Tên đơn vị tính</td>
									<td class="text-center" style="width: 80px;"></td>
								</tr>
							</thead>
							<tbody>
							</tbody>
				        </table>
				        <form id="form-unit" style="display: none;">
				        	<div class="form-group row " style="margin-bottom: 15px;">
							    <label  class="col-sm-4 col-form-label text-right" style="font-size: 15px;">Tên đơn vị tính </label>
							    <div class="col-sm-8">
							      <input type="text" name="name" class="form-control" id="txtNameUnit">
							      <div style="color: red;font-size: 15px;display:none;">Trường này không được để trống</div>
							    </div>
							  </div>
							  <div class="form-group row">
								  <div class="col-sm-8 offset-sm-4">
								  	<button class="btn-primary btn" onclick="save_unit(this)" type="button" >Lưu</button>
								  	<button class="btn btn-primary" type="button" onclick="save_unit_continue(this)">Lưu và tiếp tục</button>
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

<script type="text/javascript">
function find_edit_product(id){
	$.ajax({
				headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
			type:'get',
			url:'products/'+id+'/edit',
	        success: function (data) {
					document.getElementsByClassName("list_item_table")[0].style.display="none";
					document.getElementsByClassName("form_s1")[0].style.display="block";
					document.querySelector('[name="name"]').value=data.name; 
                    document.querySelector('[name="txtNamePrice"]').value=data.price.price_sell;
                    document.querySelector('[name="txtNameImport"]').value=data.price.price_import;
                    document.querySelector('[name="code_Product"]').value=data.Ma_sp;
                    document.querySelector('[name="txtNameNumber"]').value=data.number;
                    document.querySelector('[name="txtNameNumber"]').disabled="true";
                    document.getElementById("upload_file_image").src=data.image;
                    document.getElementsByClassName('form_s1')[0].getElementsByTagName('button')[0].setAttribute("onclick", "update_product("+data.id+")");
                    let options_category=document.getElementById("select_category").children;
             
                    for (var i = 0; i < options_category.length; i++){
                      if (options_category[i].value==data.category.id){
                          options_category[i].selected=true;
                      }
                    }
                     let options_unit=document.getElementById("select_unit").children;
                    for (var i = 0; i < options_unit.length; i++){
                      if (options_unit[i].value==data.id_dvt){
                          options_unit[i].selected=true;
                      }
                    }
			},
		});
}
function update_product(id){
	 var name=document.querySelector('[name="name"]').value;
	 var category=document.getElementById("select_category").value;
	 var price_sell=document.querySelector('[name="txtNamePrice"]').value;
	 var price_import=document.querySelector('[name="txtNameImport"]').value;
	 var number=document.querySelector('[name="txtNameNumber"]').value;
	 var code_Product=document.querySelector('[name="code_Product"]').value;
	 var unit=document.getElementById("select_unit").value;
	 var file =document.getElementById('input-file-image').files[0];
	 var data={        
	                    "_method":'PUT', 
		                "name": name,
		                "id_category":category,
		                "price_sell":price_sell,
		                "price_import":price_import,
		                "number":number,
		                "Ma_sp":code_Product,
		                "id_dvt":unit,
		                "image":file,
		                "id_company_child":1,
		          };
		    
	 var formData=new FormData();
	 for ( var key in data ) {
	    formData.append(key, data[key]);
	    };
	 formData.append('image',file);
	  $.ajax({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
		    type: 'POST', //THIS NEEDS TO BE GET
		    url: "products/"+id,
		    enctype: 'multipart/form-data',  
		    data: formData,
		    contentType: false,
	        processData: false,
		    success: function (data) {
	            
		    	var alert=document.getElementsByClassName("alert");
		        var alert_2=document.getElementById("alert_2");
		        alert[0].style.display="block";
		        alert_2.textContent=data.success;
		        setTimeout(function(){fadeOut(alert)},1500);
		      	window.location.href=window.location.href;
		         },
		    error: function(data) {
		    	if(data.responseJSON.errors['Ma_sp']){
              let errors=document.querySelector('[name="code_Product"]');
              errors.nextElementSibling.textContent=data.responseJSON.errors['Ma_sp'];
	       }
		    }
		});
}
function restore_status_product(page,id){
	let text="Bạn có muốn  khôi phục sản phẩm này?";
		if(confirm(text) == true){
		$.ajax({
				headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
			type:'get',
			url:'product/setstatus/'+id,
	        success: function (data) {
				search_product(page);
				
			},
		});
    }
}
function force_delete_product(page,id){
	let text="Bạn có thực muốn xóa sản phẩm này không";
	if(confirm(text) == true){
        $.ajax({
			headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		type:'delete',
		url:'product/forcedeleteproduct/'+id,
        success: function (data) {
			search_product(page);
			var alert=document.getElementsByClassName("alert");
	        var alert_2=document.getElementById("alert_2");
	        alert[0].style.display="block";
	        alert_2.textContent=data.success;
	        setTimeout(function(){fadeOut(alert)},1500);
		},
		});
    }
}
function restore_delete_product(page,id){
	let text="Bạn có muốn  khôi phục sản phẩm này?";
		if(confirm(text) == true){
		$.ajax({
				headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
			type:'get',
			url:'product/restoredeleteproduct/'+id,
	        success: function (data) {
				search_product(page);
				
			},
		});
    }
}
function pause_status_proudct(page,id){
	let text="Bạn có muốn ngừng kinh doanh sản phẩm này không";
		if(confirm(text) == true){
		$.ajax({
				headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
			type:'get',
			url:'product/setstatus/'+id,
	        success: function (data) {
				search_product(page);
				
			},
		});
    }
}
function delete_product(page,id){
	let text="Bạn có thực muốn xóa sản phẩm này không";
	if(confirm(text) == true){
        $.ajax({
			headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		type:'DELETE',
		url:'products/'+id,
        success: function (data) {
			search_product(page);
			var alert=document.getElementsByClassName("alert");
	        var alert_2=document.getElementById("alert_2");
	        alert[0].style.display="block";
	        alert_2.textContent=data.success;
	        setTimeout(function(){fadeOut(alert)},1500);
		},
		});
	}

}
function search_product(number_page){
	if(!number_page){
		 number_page=1;
		}
  $.ajax({
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    type: 'get', //THIS NEEDS TO BE GET
	    url: 'searchproduct',
	    data:{
	    	'status':document.getElementById("txt_search_status").value,
	    	'category':document.getElementById("txt_search_category").value,
	    	'name_product':document.querySelector('[name="txt_search_name_product"]').value,
	    	'number_page':number_page,
	    },
	    success: function (data) {
	    	            
	    	            if(data.data.data.length==0&&number_page>1){
	    	            	number_page=number_page-1;
	    	            	search_product(number_page);
	    	            }
	    	            else{
		                let table=document.getElementById('list_table_product');
			    	    let list_product=table.getElementsByTagName('tbody');
			    	    let status_1=document.getElementById("txt_search_status").value;
			    	    let footer_page=table.getElementsByTagName('tfoot')[0].getElementsByTagName('p');
				    	while (list_product[0].hasChildNodes()) {
						     list_product[0].removeChild(list_product[0].firstChild);
			            }
			            for (var i =0; i <data.data.data.length; i++) {
				            var status=data.data.data[i].status==1?"Đang giao dịch":"Ngừng giao dịch";
				            var color_status=data.data.data[i].status==1?"green":"red";
				           
				            if(status_1==0)
				            {
                               list_product[0].innerHTML+='<tr><td><img src="'+data.data.data[i].image+'" style="height: 30px;"></td><td><p style="color: #2a6496; cursor: pointer;" onclick="find_edit_product('+data.data.data[i].id+')">'+data.data.data[i].name+'</p></td><td class="text-center"><p>'+data.data.data[i].category.name+'</p><span style="background-color: red; color: #fff; display: inline-block; padding: 5px;">'+data.data.data[i].Ma_sp+'</span>		</td><td class="text-center"><p style="color: #2a6496;">'+data.data.data[i].number+'</p><span>Giá nhập: '+data.data.data[i].price.price_import+'đ</span></td><td class="text-center"><i class="fa fa-circle complete" style="color:'+color_status+';"></i>'+status+'</td><td class="text-center">'+data.data.data[i].create_up+'</td><td class="text-center"><i class="fa fa-repeat href" style="color: #2a6496;cursor: pointer;" onclick=" restore_status_product('+data.data.current_page+","+data.data.data[i].id+')"></i></td></tr>';
                                  
				            }
				            else if(status_1==2){
				            	
				            	list_product[0].innerHTML+='<tr><td><img src="'+data.data.data[i].image+'" style="height: 30px;"></td><td><p style="color: #2a6496; cursor: pointer;" onclick="find_edit_product('+data.data.data[i].id+')">'+data.data.data[i].name+'</p></td><td class="text-center"><p>'+data.data.data[i].category.name+'</p><span style="background-color: red; color: #fff; display: inline-block; padding: 5px;">'+data.data.data[i].Ma_sp+'</span>		</td><td class="text-center"><p style="color: #2a6496;">'+data.data.data[i].number+'</p><span>Giá nhập: '+data.data.data[i].price.price_import+'đ</span></td><td class="text-center"><i class="fa fa-circle complete" style="color:'+color_status+';"></i>'+status+'</td><td class="text-center">'+data.data.data[i].create_up+'</td><td class="text-center"><i class="fa fa-repeat href" style="color: #2a6496;cursor: pointer;" onclick="restore_delete_product('+data.data.current_page+","+data.data.data[i].id+')"></i><i class="fa fa-eraser href" style="color: #2a6496;cursor: pointer;" onclick="force_delete_product('+data.data.current_page+","+data.data.data[i].id+')"></i></td></tr>';
				            	
				            }
				        	else
				            {
                               list_product[0].innerHTML+='<tr><td><img src="'+data.data.data[i].image+'" style="height: 30px;"></td><td><p style="color: #2a6496; cursor: pointer;" onclick="find_edit_product('+data.data.data[i].id+')">'+data.data.data[i].name+'</p></td><td class="text-center"><p>'+data.data.data[i].category.name+'</p><span style="background-color: red; color: #fff; display: inline-block; padding: 5px;">'+data.data.data[i].Ma_sp+'</span>		</td><td class="text-center"><p style="color: #2a6496;">'+data.data.data[i].number+'</p><span>Giá nhập: '+data.data.data[i].price.price_import+'đ</span></td><td class="text-center"><i class="fa fa-circle complete" style="color:'+color_status+';"></i>'+status+'</td><td class="text-center">'+data.data.data[i].create_up+'</td><td class="text-center"><i class="fa fa-pause href" style="color: #2a6496;cursor: pointer;" onclick="pause_status_proudct('+data.data.current_page+","+data.data.data[i].id+')"></i>							<i class="fa fa-trash href" style="color: #2a6496;cursor: pointer;" onclick="delete_product('+data.data.current_page+","+data.data.data[i].id+')"></i></td></tr>';
                               
				            }
			            }
			    	    let number_footer_page=table.getElementsByTagName('nav');
			    	   
			            if(data.total!=0)
			            {
				            footer_page[0].innerHTML="Kết quả từ "+data.firstItem+ "-" +data.lastItem+" trên tổng số "+data.total;
				            if(data.data.last_page>1){
								while (number_footer_page[0].hasChildNodes()) {
										number_footer_page[0].removeChild(number_footer_page[0].firstChild);
								}
								 number_footer_page[0].innerHTML='<ul class="pagination justify-content-end"></ul>';
								number_footer_page=table.getElementsByTagName('ul');
				            	let start= data.data.current_page-2;
				            	let end= data.data.current_page+2;
				            	if(start<1){
				            	 	start=1;
				            	 	end+=1;
				            	}
				            	if(data.data.current_page!=1)
					            	{
					            		 number_footer_page[0].innerHTML+='<li class="page-item">											     <a class="page-link" onclick="search_product('+(data.data.current_page-1)+')"><<</a>											        </li>';
					            	}
				            	if(start>1){
					            	  number_footer_page[0].innerHTML+='<li class="page-item">											     <a class="page-link" onclick="search_product('+1+')">{{1}}</a>											        </li>';
			                          if(data.data.current_page!=4){
					            		number_footer_page[0].innerHTML+=' <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
					            	 }
					            	}
				            	if(end>data.data.last_page){
				            	 	end=data.data.last_page;
				            	}

		                        for (var i = start; i <= end; i++) {
			                       	if(data.data.current_page==i)
			                       	{
			                        number_footer_page[0].innerHTML+='<li class="page-item active ">              		                	<a class="page-link">'+i+'</a></li>';
			                       }
			                       else {
		                              number_footer_page[0].innerHTML+='<li class="page-item ">              		                	<a class="page-link"onclick="search_product('+i+')">'+i+'</a></li>';
			                       }
				                }
		                        if(end<data.data.last_page){
		                        	  if(data.data.current_page + 3 != data.data.last_page){
		                                 number_footer_page[0].innerHTML+=' <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
		                        	  }
		                        	  number_footer_page[0].innerHTML+='<li class="page-item">									<a class="page-link" >'+data.data.last_page+'</a>											        </li>';
			                    }
			                    if(data.data.current_page!=data.data.last_page)
			                        {
				                    	number_footer_page[0].innerHTML+='<li class="page-item">											     <a class="page-link" href="#">>></a>						 </li>';
				                    }
		                    }
		                    else{
		                    	while (number_footer_page[0].hasChildNodes()) {
										number_footer_page[0].removeChild(number_footer_page[0].firstChild);
								}
		                    }     
			            } 
			            else {
			            	footer_page[0].innerHTML="Không có kết quả được tìm thấy";
			            	while (number_footer_page[0].hasChildNodes()) {
										number_footer_page[0].removeChild(number_footer_page[0].firstChild);
								}		
			            }
	                }
	            },
	    error: function(data) { 
	          
	    }
	});
}

function save_product_FE(){
	    document.getElementsByClassName("form_s1")[0].style.display="block";
	    document.getElementsByClassName("list_item_table")[0].style.display="none";
	    document.getElementsByClassName("breadcrumb")[0].style.display="block";
	    document.getElementsByClassName("form-inline")[0].style.display="none";
	    document.querySelector('[name="name"]').value=""; 
        document.querySelector('[name="txtNamePrice"]').value="";
        document.querySelector('[name="txtNameImport"]').value="";
        document.querySelector('[name="code_Product"]').value="";
        document.querySelector('[name="txtNameNumber"]').value="";
        document.querySelector('[name="txtNameNumber"]').removeAttribute("disabled");
        document.getElementsByClassName('form_s1')[0].getElementsByTagName('button')[0].setAttribute("onclick", "save_product()");
        document.getElementById("upload_file_image").src='storage/app/public/default.jpg';
        list_category();
        list_unit();
}
function list_product_FE(){
	    document.getElementsByClassName("form_s1")[0].style.display="none";
	    document.getElementsByClassName("list_item_table")[0].style.display="block";
	    document.getElementsByClassName("breadcrumb")[0].style.display="none";
	    document.getElementsByClassName("form-inline")[0].style.display="block";
}

function save_product(){
 var name=document.querySelector('[name="name"]').value;
 var category=document.getElementById("select_category").value;
 var price_sell=document.querySelector('[name="txtNamePrice"]').value.replace(',', '');
 var price_import=document.querySelector('[name="txtNameImport"]').value.replace(',', '');
 var number=document.querySelector('[name="txtNameNumber"]').value;
 var code_Product=document.querySelector('[name="code_Product"]').value;
 var unit=document.getElementById("select_unit").value;
 var file =document.getElementById('input-file-image').files[0];
 var data={
	                "name": name,
	                "id_category":category,
	                "price_sell":price_sell,
	                "price_import":price_import,
	                "number":number,
	                "Ma_sp":code_Product,
	                "id_dvt":unit,
	                "image":file,
	                "id_company_child":1,
	          };
	    
 var formData=new FormData();
 for ( var key in data ) {
    formData.append(key, data[key]);
    };
 formData.append('image',file);
  $.ajax({
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    type: 'POST', //THIS NEEDS TO BE GET
	    url: 'products',
	    enctype: 'multipart/form-data',  
	    data: formData,
	    contentType: false,
        processData: false,
	    success: function (data) {
            
	    	var alert=document.getElementsByClassName("alert");
	        var alert_2=document.getElementById("alert_2");
	        alert[0].style.display="block";
	        alert_2.textContent=data.success;
	        setTimeout(function(){fadeOut(alert)},1500);
	      	window.location.href=window.location.href;
	         },
	    error: function(data) {
	    	
	       if(data.responseJSON.errors['Ma_sp']){
              let errors=document.querySelector('[name="code_Product"]');
              errors.nextElementSibling.textContent=data.responseJSON.errors['Ma_sp'];
	       }
	    }
	});
}
function upload_file(e){
    const file = e.files[0];
    const preview=document.getElementById("upload_file_image");
    const reader = new FileReader();
    reader.onload = function() {
        preview.src = reader.result;
    };
    if (file) {
    reader.readAsDataURL(file);
    
  }
}
function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
 }
function txt_number_key(e)
	{
		 if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105 || e.keyCode==37||e.keyCode==39||e.keyCode==8)) {
		  
		 }
		 else {
		 	e.preventDefault();
	 }
	}
function txt_number_value(val){ 
 val.value=val.value.replace(/^0+/, '');
 val.value=numberWithCommas(val.value.replace(/[^\w\s]/gi, '')); 
 
}
function list_category() {
    var btn_click=document.getElementsByClassName("modal-header-bar");
    btn_click[0].firstElementChild.style.backgroundColor="#fff";
    btn_click[0].lastElementChild.style.backgroundColor="#EFF3F8";
	var x=document.getElementById('list_category');
	x.style.display="table";
	var y=document.getElementById('form-category');
	y.style.display="none";
	var z= x.getElementsByTagName('tbody');
	$.ajax({
	    type: 'GET', //THIS NEEDS TO BE GET
	    url: 'category',
	    success: function (data) {
	    	while (z[0].hasChildNodes()) {
			     z[0].removeChild(z[0].firstChild);
            }
	        for (var i =0; i <data.length; i++) {
	        	z[0].innerHTML+='<tr><td>'+data[i].id+'</td>									<td class="text-center">'+data[i].name+'</td>		    <td class="text-center">									    <i class="fa fa-trash href" style="color: #2a6496;cursor: pointer;" onclick="delete_category('+data[i].id+')"></i></td></tr>';
	        }
	        var select_category=document.getElementById("select_category");
	        list_data_select(select_category,data);  	      
	    },
	    error: function() { 
	        
	    }
    });
}
function list_data_select(elemet_id,data){
	while (elemet_id.hasChildNodes()) {
			elemet_id.removeChild(elemet_id.firstChild);
        }
         for (var i =0; i <data.length; i++) {
	        	elemet_id.innerHTML+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
	        }
}
function form_category(e) {
	var x=document.getElementById('list_category');
	x.style.display="none";
	var y=document.getElementById('form-category');
	y.style.display="block";
	e.style.backgroundColor="#fff";
	e.previousElementSibling.style.backgroundColor="#EFF3F8";
}
function delete_category(id){
	$.ajax({
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    type: 'POST', //THIS NEEDS TO BE GET
	    url: 'category/'+id,
	    data: {
	                "id": id,
	                "_method": 'DELETE',
	                "_token": $('meta[name="csrf-token"]').attr('content'),
	          },
	    success: function (data) {
	        
	        list_category();
	    },
	    error: function() { 
	        
	    }
	});
}
function save_category(e){
	if(document.getElementById("txtNameCategory").value==''){
			document.getElementById("txtNameCategory").nextElementSibling.style.display="block";
	}
	if(document.getElementById("txtNameCategory").value!=''){
			document.getElementById("txtNameCategory").nextElementSibling.style.display="none";
			$.ajax({
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    type: 'POST', //THIS NEEDS TO BE GET
	    url: 'category',
	    data: {
	                "name": document.getElementById("txtNameCategory").value,
	                "id_company_child":1,
	          },
	    success: function (data) {
	        list_category();
	        alert[0].style.display="block";
	        alert_2.textContent=data.success;
	        document.getElementById("txtNameCategory").value="";
	        setTimeout(function(){fadeOut(alert)},1500);

	    },
	    error: function(data) { 
	          console.log(data);
	    }
	});
	}
	var alert=document.getElementsByClassName("alert");
	var alert_2=document.getElementById("alert_2");
  
}
function save_category_continue(e){
	if(document.getElementById("txtNameCategory").value==''){
			document.getElementById("txtNameCategory").nextElementSibling.style.display="block";
	}
	if(document.getElementById("txtNameCategory").value!=''){
			document.getElementById("txtNameCategory").nextElementSibling.style.display="none";
	var alert=document.getElementsByClassName("alert");
	var alert_2=document.getElementById("alert_2");
  $.ajax({
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    type: 'POST', //THIS NEEDS TO BE GET
	    url: 'category',
	    data: {
	                "name": document.getElementById("txtNameCategory").value,
	                "id_company_child":1,
	          },
	    success: function (data) {
	        document.getElementById("txtNameCategory").value="";
	        alert[0].style.display="block";
	        alert_2.textContent=data.success;
	        $.ajax({
					    type: 'GET', //THIS NEEDS TO BE GET
					    url: 'category',
					    success: function (data) {
					    	
					        var select_category=document.getElementById("select_category");
					        list_data_select(select_category,data);  	      
					    },
					    error: function() { 
					        
					    }
				    });
	        setTimeout(function(){fadeOut(alert)},1500);
	    },
	    error: function() { 
	          
	    }
	});
}
}
function list_unit(){
	var btn_click=document.getElementsByClassName("modal-header-bar");
    btn_click[1].firstElementChild.style.backgroundColor="#fff";
    btn_click[1].lastElementChild.style.backgroundColor="#EFF3F8";
	var x=document.getElementById('list_unit');
	x.style.display="table";
	var y=document.getElementById('form-unit');
	y.style.display="none";
	var z= x.getElementsByTagName('tbody');
	$.ajax({
	    type: 'GET', //THIS NEEDS TO BE GET
	    url: 'Unit',
	    success: function (data) {
	    	while (z[0].hasChildNodes()) {
			     z[0].removeChild(z[0].firstChild);
            }
	        for (var i =0; i <data.length; i++) {
	        	
	        	z[0].innerHTML+='<tr><td>'+data[i].id+'</td>									<td class="text-center">'+data[i].name+'</td>		    <td class="text-center">									    <i class="fa fa-trash href" style="color: #2a6496;cursor: pointer;" onclick="delete_unit('+data[i].id+')"></i></td></tr>';
	        	var select_unit=document.getElementById("select_unit");
	        list_data_select(select_unit,data);  
	        }  	      
	    },
	    error: function() { 
	        
	    }
    });
}
function form_unit(e) {
	var x=document.getElementById('list_unit');
	x.style.display="none";
	var y=document.getElementById('form-unit');
	y.style.display="block";
	e.style.backgroundColor="#fff";
	e.previousElementSibling.style.backgroundColor="#EFF3F8";
}
function save_unit(e){
	if(document.getElementById("txtNameUnit").value==''){
			document.getElementById("txtNameUnit").nextElementSibling.style.display="block";
	}
	if(document.getElementById("txtNameUnit").value!=''){
			document.getElementById("txtNameUnit").nextElementSibling.style.display="none";
			var alert=document.getElementsByClassName("alert");
	var alert_2=document.getElementById("alert_2");
   $.ajax({
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    type: 'POST', //THIS NEEDS TO BE GET
	    url: 'Unit',
	    data: {
	                "name": document.getElementById("txtNameUnit").value,
	                "id_company_child":1,
	          },
	    success: function (data) {
	        
	        list_unit();
	        alert[0].style.display="block";
           
	        alert_2.textContent=data.success;
	        document.getElementById("txtNameUnit").value="";
	        setTimeout(function(){fadeOut(alert)},1500);
	    },
	    error: function(data) { 
	          console.log(data);
	    }
	});
	}
	
}
function save_unit_continue(e){
	if(document.getElementById("txtNameUnit").value==''){
			document.getElementById("txtNameUnit").nextElementSibling.style.display="block";
	}
	if(document.getElementById("txtNameUnit").value!=''){
			document.getElementById("txtNameUnit").nextElementSibling.style.display="none";
	var alert=document.getElementsByClassName("alert");
	var alert_2=document.getElementById("alert_2");
  $.ajax({
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    type: 'POST', //THIS NEEDS TO BE GET
	    url: 'Unit',
	    data: {
	                "name": document.getElementById("txtNameUnit").value,
	                "id_company_child":1,
	          },
	    success: function (data) {
	        
	        document.getElementById("txtNameUnit").value="";
	        alert[0].style.display="block";

	        alert_2.textContent=data.success;
	        $.ajax({
					    type: 'GET', //THIS NEEDS TO BE GET
					    url: 'category',
					    success: function (data) {
					    	
					        var select_unit=document.getElementById("select_unit");
					        list_data_select(select_category,data);  	      
					    },
					    error: function() { 
					        
					    }
				    });
	        setTimeout(function(){fadeOut(alert)},1500);
	    },
	    error: function() { 
	          
	    }
	});
    }
}
function delete_unit(id){

	$.ajax({
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    type: 'POST', //THIS NEEDS TO BE GET
	    url: 'Unit/'+id,
	    data: {
	                "id": id,
	                "_method": 'DELETE',
	          },
	    success: function (data) {

	        list_unit();
	    },
	    error: function() { 
	        
	    }
	});
}
function fadeOut(elementToFade)
        {   
            elementToFade[0].style.opacity -= 0.1;
            if(elementToFade[0].style.opacity <=0.0) {
            	elementToFade[0].style.display="none";
                elementToFade[0].style.opacity=1;
            } else {
                setTimeout(function(){fadeOut(elementToFade)},200);
            }
        }
</script>
@endsection
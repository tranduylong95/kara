@extends('layouts.master')
@section('content')
		<div class="form-inline" >
			<form method="get" action='{{ url("/orders/search")}}'>
	            <div class="form-group" style="position: relative;">
	            	<label>Từ ngày</label>
	             	<input type="text" name="time_start" class="form-control flatpickr-input" id="datetimepicker4" readonly="readonly">
	             	<label>đến</label>
	            </div>
	            <div class="form-group" style="position: relative;">
	             	<input type="text" name="time_to" class="form-control flatpickr-input active" id="datetimepicker5" readonly="readonly">
	            </div>
	            <div class="form-group">
	             	<input type="text" name="" class="form-control" placeholder="Tìm Kiếm Theo Mã Nhập Hàng">
	             	 <button class="btn btn-primary" type=submit>Tìm Kiếm</button>
	            </div>
            </form>
          
		</div>
		<div class="content" >
			<div class="list_item_table mr-t1 mr-t20" style="background-color: #FFF ; ">
        		 <table class="table">
        		 	<thead class="thead-light" style="background-color: #0d6efd47">
						<tr>
							<th>Mã Hóa Đơn</th>
							<th class="text-center">Phòng/Bàn - Khu vực</th>
							<th class="text-center">Tổng tiền</th>
							<th>Thông tin giao dịch</th>
							<th class="text-center">Trạng thái</th>
						</tr>
					</thead> 
					<tbody>
						@foreach($data_order as $value)
						<tr>
							<td><p style="color: teal;font-weight: bold;">{{$value->code_order}}<p></td>
							<td class="text-center">P/B: {{$value->room->name}}- KV: {{$value->room->area->name}}</td>
							<td class="text-center" class="total"><b style="color: red;">
                                 <?php
                                   $total=0; 
                                   foreach($value->timemoney as $item){
                                   	  $a=strtotime($item->time_finish)-strtotime($item->time_start);
                                   	  $total+=ceil(round($item->price_time/60*round($a/60))-round($item->price_time/60*round($a/60))*$item->discount_time/100);
                                   }
                                   foreach ($value->detailorder as $item ) {
                                   	    $total+=ceil($item->price->price_sell*$item->number-$item->price->price_sell*$item->number*$item->discount_product/100);
                                   	 
                                   }
                                   $total=ceil($total+$total/100*$value->VAT-$total/100*$value->discount_order);
                                 ?>
                             
							{{number_format($total)}}đ</b></td>
							<td ><p style="font-size: 14px;"> Ngày bán: {{$value->created_at}}</p>
							  
							</td>
							<td class="text-center">
								<p><a onclick ="detail_order({{$value->id}})"href="javascript:void(0);"style="padding: 3px 10px; color: #FFF;border-radius: 5px; background-color: #3FB2AD;" data-toggle="modal" data-target="#order" >Hoàn thành</a></p>
								@if(Auth::user()->rank==0)
								<p><a href="{{ url('orders/delete',['id'=>$value->id]) }}" style="padding: 3px 10px; color: #FFF;border-radius: 5px; background-color: grey;">Xóa <a></p>
								@endif
							</td>
						</tr>
						
						@endforeach
					</tbody>
					<tfoot>
					<tr>
	                    <td colspan="100">
	                        <div class="row">
	                            <div class="col-md-4 col-xs-6 mt10">
	                                <p> Kết quả từ {{$data_order->firstItem()}}-{{$data_order->lastItem()}} trên tổng {{$data_order->total()}}</p>
	                            </div>
	                            <div class="col-md-8 col-xs-6 text-right">
	                                <nav aria-label="Page navigation">
	                                	@if ($data_order->hasPages())
		                                	<ul class="pagination justify-content-end">
		                                		@if(!$data_order->onFirstPage())
											    <li class="page-item">
											      <a class="page-link" href="{{$data_order->previousPageUrl()}}" tabindex="-1"><<</a>
											    </li>
											    @endif
											    <?php
											        $start = $data_order->currentPage() - 2; // show 3 pagination links before current
											        $end = $data_order->currentPage() + 2; // show 3 pagination links after current
											        if($start < 1) {
											            $start = 1; // reset start to 1
											            $end += 1;
											        } 
											        if($end >= $data_order->lastPage()) $end = $data_order->lastPage(); // reset end to last page
											    ?>
											    @if($start > 1)
											        <li class="page-item">
											            <a class="page-link" href="{{ $data_order->url(1) }}">{{1}}</a>
											        </li>
											        @if($data_order->currentPage() != 4)
											            {{-- "Three Dots" Separator --}}
											            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
											        @endif
											    @endif
											        @for ($i = $start; $i <= $end; $i++)
											            <li class="page-item {{ ($data_order->currentPage() == $i) ? ' active' : '' }}">
											                <a class="page-link"  href="{{ $data_order->url($i) }}" >{{$i}}</a>
											            </li>
											        @endfor
											    @if($end < $data_order->lastPage())
											        @if($data_order->currentPage() + 3 != $data_order->lastPage())
											            {{-- "Three Dots" Separator --}}
											            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
											        @endif
											        <li class="page-item">
											            <a class="page-link"  href="{{ $data_order->url($data_order->lastPage()) }}">{{$data_order->lastPage()}}</a>
											        </li>
											    @endif
											    @if($data_order->currentPage()!=$data_order->lastPage())
											    <li class="page-item">
											      <a class="page-link" href="{{$data_order->nextPageUrl()}}" >>></a>
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
	    </div>
	    <div class="modal fade bd-example-modal-xl" id="order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
	    <div class="modal-dialog modal-xl " role="document">
		    <div class="modal-content">
			    <div class="modal-body">
			    	<div class="form_s1 " style="margin-top: 20px;">
						<div class="row">
							<div class="col-lg-6">
								<span style="padding: 5px; background-color: #e7f2f5;border-radius: 20px;"><i class="fa fa-circle" aria-hidden="true" style="color: #348ce6; margin-right:5px;"></i> Hoàn thành</span>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-md-8 text-right">
		                                <i class="fa fa-truck" aria-hidden="true" style="margin-right: 10px;"></i>sdasd
	                                </div>
	                                 <div class="col-md-4 text-right">
			                                <div class="btn-group print">
			                                    <button type="button" onclick="PrintfInOrder()" class="btn btn-success" style="padding-left: 25px; padding-right: 25px;" id="prinf_order">In
			                                    </button>
			                                </div>
	                                </div>
                                </div>
							</div>
						    <div class="col-lg-12">
								<div class="col-lg-9" style="padding-left: 15px;
								padding-right: 15px;">
									<div class="form-group row mr-b1" >
											<div class="col-lg-6" >
												<div style=" display:flex;position: relative; width: 100%;">
														<button class="btn" style="border: 1px solid red;"><i class="fa fa-search"></i></button>
														<input type="" name="" class="form-control" placeholder="Tìm Kiếm Theo Tên Sản Phẩm" onkeyup="search_product(this)">
														<div class="seach-n1" style="display: none;z-index: 9999;">
															<div class="seach-item">
																<div>Súp kem gấu đỏ jas</div>
																<div>
																	<span style="font-size: 13px;">HD00000001</span>
																	<span style="font-size: 13px;"> Có Thể Bán: 500đ-</span>
																	<span style="font-size: 13px;"> Giá Nhập: 500đ</span>
																</div>
															</div>
														</div>
												</div>
											</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
			      	<table class="table" id="table_detail_order" >
						<thead class="thead-light" style="background-color: #0d6efd47">
							<tr>
								<th>Mã Sản Phẩm</th>
								<th>Tên Sản Phẩm</th>
								<th class="text-center" style="width: 10%;">Số Lượng</th>
								<th class="text-center" style="width: 15%;">Đơn Giá</th>
								<th class="text-center" style="width: 15%;">Chiết khấu</th>
								<th class="text-right">Thành Tiền</th>
							</tr>
						</thead>  
						<tbody>
							<tr>
								<td>SP000001</td>

								<td >Bia Tiger</td>
								<td class="text-center">0</td>
								<td class="text-center">0</td>
								<td class="text-center">0%</td>
								<td class="text-right">20,0000</td>
							</tr>
						</tbody>
				    </table>
				    <div class="row" id="table_detail_edit" style="display: none;">
				    	<div class="col-lg-9">
						    <table class="table"  >
								<thead class="thead-light" style="background-color: #0d6efd47">
									<tr>
										<th>Mã Sản Phẩm</th>
										<th>Tên Sản Phẩm</th>
										<th class="text-center" style="width: 10%;">Số Lượng</th>
										<th class="text-center"style="width: 20%;" >Đơn Giá</th>
										<th class="text-center" style="width: 10%">Chiết khấu(%)</th>
										<th class="text-right">Thành Tiền</th>
										<th class="text-center"></th>
									</tr>
								</thead>  
								<tbody>
									<tr>
										<td>SP000001</td>
										<td>Bia Tiger</td>
										<td>
											<div class="quantity">
											  <input type="number"  class="form-control text-right" value="1" onkeyup="number0(this)">
												 
											</div>
										</td>
										<td style="display: flex;"><input type="" name="" class="form-control text-right" ></td>
										<td class="text-right"><input type=""  class="form-control text-right" ></td>
										<td class="text-right">20,0000</td>
										<td><i class="fas fa-trash del-pro-input" style="font-size: 13px; color: #2a6496"></i></td>
									</tr>
								</tbody>
						    </table>
					    </div>
					    <div class="col-lg-3">
					    	<div class="row"  style="margin-top: 10px; margin-bottom: 10px;">
											<div class="col-sm-6 col-6 ">Chiết  khấu(%)</div>
											<div class="col-sm-6 col-6 text-right">
												<input type="number" name="discount_order" class="form-control text-right" style="height: 30px;" onkeyup="number1(this)">
									        </div>
					    	</div>
					    	<div class="row"  style="margin-top: 10px; margin-bottom: 10px;">
											<div class="col-sm-6 col-6 ">VAT(%)</div>
											<div class="col-sm-6 col-6 text-right">
												<input type="number" name="VAT" class="form-control text-right" style="height: 30px;" onkeyup="number1(this)">
									        </div>
					    	</div>
					    </div>
				    </div>
				    <div class="footer-table">
					    	<div class="row">
					    	   <div class="col-md-6"></div>
					    	   <div class="col-md-6">
					    	   	    <nav class="nav">
									  <a class="nav-link" aria-current="page" href="#" style=" border: 1px solid #ddd; border-bottom-color:transparent;"><i class="fa fa-user" style="margin-right: 5px;"></i>Thông tin thanh toán
									  </a>
									  <a class="nav-link" href="#" style="display: none;"><i class="fa fa-history"></i>Lịch sử sửa phiếu</a>
									</nav>
									<div class="infor-order">
						    	   	    <div class="row"  style="margin-top: 10px; margin-bottom: 10px;">
												<div class="col-sm-8 col-6">Tổng tiền hàng</div>
												<div class="col-sm-4 col-6 text-left">
													<span>0</span>
										        </div>
						    	   	    </div>
						    	   	     <div class="row"  style="margin-top: 10px; margin-bottom: 10px;">
												<div class="col-sm-8 col-6">Tổng tiền giờ</div>
												<div class="col-sm-4 col-6 text-left">
													<span>0</span>
										        </div>
						    	   	    </div>
						    	   	  	<div class="row"  style="margin-top: 10px; margin-bottom: 10px;">
												<div class="col-sm-8 col-6 ">Tổng thanh toán</div>
												<div class="col-sm-4 col-6 text-left" >
													<span>0</span>
										        </div>
						    	   	    </div>
						    	   	    <div class="row"  style="margin-top: 10px; margin-bottom: 10px;">
												<div class="col-sm-8 col-6 ">Chiết khấu </div>
												<div class="col-sm-4  col-6 text-left" >
													<span >0</span>
										        </div>
						    	   	    </div>
						    	   	    <div class="row"  style="margin-top: 10px; margin-bottom: 10px;">
												<div class="col-sm-8 col-6">VAT</div>
												<div class="col-sm-4  col-6 text-left">
													<span>0</span>
										        </div>
						    	   	    </div>
						    	   	    <div class="row" >
						    	   	    	   <div class="col-sm-12" style="border-top: 1px solid #d8d7d7;"></div>
						    	   	    	   <div class="col-sm-8 col-6">Khách thanh toán</div>
	                                           <div class="col-sm-4  col-6 text-left" >
													<span>0</span>
										        </div>
	                                    </div>
					    	   	    </div>
					    	   </div> 
					    	</div>
				    </div>	
					<div class="modal-footer" style="padding: 5px; border:0px;">
						    <button type="button" class="btn btn-primary" style="border-color:#adadad;font-size: 13px;" onclick="edit_order_FE(0)">
					        	<i class="fa fa-pencil-square-o"></i>Chỉnh sửa</button>
					        <button type="button" class="btn" style="border-color:#adadad;font-size: 13px; display: none;" onclick="">
					        Lưu</button>
					        <button type="button" class="btn"  style="border-color:#adadad;font-size: 13px; display: none;" onclick="edit_order_FE(1)">
					        	<i class="fa fa-undo" style="display: none;"></i>Quay lại</button>
					        <button type="button" class="btn"  style="border-color:#adadad;font-size: 13px;" data-dismiss="modal" onclick="edit_order_FE(2);">
					        	Đóng</button>
					</div>
			    </div>
			</div>
	    </div>
	</div>
<script type="text/javascript">
		 	    var optional_config={
		             dateFormat: "Y-m-d",
		 	    }
		 	      var optional_config1={
		             enableTime: true,

		 	    }
		      $("#datetimepicker4").flatpickr(optional_config);
		      $("#datetimepicker5").flatpickr(optional_config);
		      $("#datetimepicker6").flatpickr(optional_config1);
function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
 }
function detail_order(id) {
	let x =document.getElementById('table_detail_order').getElementsByTagName('tbody');
	let y=document.getElementById('table_detail_edit').getElementsByTagName('tbody');
	y[0].innerHTML="";
	x[0].innerHTML="";
	var xz= location.origin+location.hostname +location.pathname;
	console.log(location);
    	  $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'get',
              url:'http://localhost/karaoke/orders/'+id,
              success: function (data) {
                    console.log(data);
                    let total_money_product=0;
                    let total_money_time=0;
	                for (var i = 0; i < data.detail_order.length; i++) {
	                	let t=document.createElement('tr');
			            const att = document.createAttribute("data-id");
			            att.value=data.id;
			            t.setAttributeNode(att);
			            let tedit=document.createElement('tr');
			            const attedit = document.createAttribute("data-id");
			            attedit.value=data.detail_order[i].product.id;
			            tedit.setAttributeNode(attedit);
                        t.innerHTML='<td>'+data.detail_order[i].product.Ma_sp+'</td><td >'+data.detail_order[i].product.name+'</td>								<td class="text-center">'+data.detail_order[i].number+'</td><td class="text-center">'+data.detail_order[i].price.price_sell+'</td><td class="text-center">'+data.detail_order[i].discount_product+'%</td><td class="text-right">'+numberWithCommas(Math.round(data.detail_order[i].number*data.detail_order[i].price.price_sell-data.detail_order[i].price.price_sell*data.detail_order[i].number*data.detail_order[i].discount_product/100))+'</td>';
                        total_money_product+=Math.round(data.detail_order[i].number*data.detail_order[i].price.price_sell-data.detail_order[i].price.price_sell*data.detail_order[i].number*data.detail_order[i].discount_product/100);
                        tedit.innerHTML='<td data-id="'+data.detail_order[i].id_dvt+'">'+data.detail_order[i].product.Ma_sp+'</td><td>'+data.detail_order[i].product.name+'</td><td><div class="quantity"><input type="number" name="" class="form-control text-right" value="'+data.detail_order[i].number+'" onkeyup="number0(this)"></div></td><td style="display: flex;"><input type="" name="" class="form-control text-right" value="'+data.detail_order[i].price.price_sell+'" data-id="'+data.detail_order[i].price.id+'" disabled></td><td class="text-right"><input type="number" name="" class="form-control text-right"  value="'+data.detail_order[i].discount_product+'" onkeyup="number12(this)"></td><td class="text-right">'+numberWithCommas(Math.round(data.detail_order[i].number*data.detail_order[i].price.price_sell-data.detail_order[i].price.price_sell*data.detail_order[i].number*data.detail_order[i].discount_product/100))+'</td><td><i class="fas fa-trash del-pro-input" style="font-size: 13px; color: #2a6496" onclick="deleteproductdetailorder('+data.detail_order[i].product.id+')"></i></td>';
                        x[0].appendChild(t);
                        y[0].appendChild(tedit);
                    }
                      for (var i = 0; i < data.time_money.length; i++) {
                      	let time_start= new Date(data.time_money[i].time_start);
                      	let time_finish= new Date(data.time_money[i].time_finish);
                      	let time_money=Math.round(time_finish/1000/60-time_start/1000/60);
                      	                
                      	total_money_time+=Math.ceil(data.time_money[i].price_time/60*time_money-data.time_money[i].discount_time/100*data.time_money[i].price_time/60*time_money);
                      }
                      let total=total_money_time+total_money_product;
                    document.getElementsByClassName('infor-order')[0].getElementsByTagName('span')[0].textContent=numberWithCommas(total_money_product)+" đ";
                     document.getElementsByClassName('infor-order')[0].getElementsByTagName('span')[1].textContent=numberWithCommas(total_money_time)+" đ";
                     document.getElementsByClassName('infor-order')[0].getElementsByTagName('span')[2].textContent=numberWithCommas(total_money_time+total_money_product)+" đ";
                     document.getElementsByClassName('infor-order')[0].getElementsByTagName('span')[3].textContent=numberWithCommas(Math.round(total*data.discount_order/100))+" đ";
                     document.getElementsByClassName('infor-order')[0].getElementsByTagName('span')[4].textContent=numberWithCommas(Math.round(total*data.VAT/100))+" đ";
                     document.getElementsByClassName('infor-order')[0].getElementsByTagName('span')[5].textContent=numberWithCommas(Math.round(total*data.VAT/100+total-total*data.discount_order/100))+" đ";
                      document.querySelector('[name="discount_order"]').value=data.discount_order;
                      document.querySelector('[name="VAT"]').value=data.VAT;
                      let button= document.getElementsByClassName('modal-footer')[0].getElementsByTagName('button');
                       button[1].setAttribute('onclick', " update_order("+data.id+")");
                       document.getElementById("prinf_order").setAttribute('onclick', " PrintfInOrder("+id+")");
              }
            });
}
function edit_order_FE(status){
	if(status==0)
	{
	   let x =document.getElementById('table_detail_order').style.display="none";
	   let y=document.getElementById('table_detail_edit').style.display="flex";
	   document.getElementsByClassName('footer-table')[0].style.display="none";
	  let button= document.getElementsByClassName('modal-footer')[0].getElementsByTagName('button');
	  button[0].style.display="none";
	  button[1].style.display="block";
	  button[2].style.display="block";
   }
   if(status==1){
   	 let x =document.getElementById('table_detail_order').style.display="table";
	 let y=document.getElementById('table_detail_edit').style.display="none";
	 document.getElementsByClassName('footer-table')[0].style.display="block";
	 let button= document.getElementsByClassName('modal-footer')[0].getElementsByTagName('button');
	  button[0].style.display="block";
	  button[1].style.display="none";
	  button[2].style.display="none";
   }
   if(status==2){
   	 let x =document.getElementById('table_detail_order').style.display="table";
	 let y=document.getElementById('table_detail_edit').style.display="none";
	 document.getElementsByClassName('footer-table')[0].style.display="block";
	 let button= document.getElementsByClassName('modal-footer')[0].getElementsByTagName('button');
	  button[0].style.display="block";
	  button[1].style.display="none";
	  button[2].style.display="none";
	  location.reload();
   }
}

function update_order(id_order){
    let data_table=document.getElementById('table_detail_edit').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    let data_detail_order=[];
    for(var i=0;i<data_table.length;i++){
         console.log(data_table[i].getElementsByTagName('input')[1].getAttribute('data-id'));
         data_detail_order.push({
         	'id_product':data_table[i].getAttribute('data-id'),
         	'id_price':data_table[i].getElementsByTagName('input')[1].getAttribute('data-id'),
	        'number':data_table[i].getElementsByTagName('input')[0].value,
	        'id_dvt':data_table[i].getElementsByTagName('td')[0].getAttribute('data-id'),
	        'discount_product':data_table[i].getElementsByTagName('input')[2].value,});
    }
    console.log(data_detail_order);
     $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'put',
              url:'http://localhost/karaoke/orders/'+id_order,
              data:{
              'detail_order':data_detail_order,
              'id_order':id_order,
              'discount_order': document.querySelector('[name="discount_order"]').value,
              'VAT': document.querySelector('[name="VAT"]').value,
              },
              success: function (data) {
                 detail_order(id_order);
                 edit_order_FE(1);
              },
              error: function(data){
                console.log(data);
              }
            });
}
function search_product(e){
 let search_product=e.value.trim();
    $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'http://localhost/karaoke/software/searchproducts',  
              data:{
                'search_product':search_product,
                
              },
              success: function (data) {
                document.getElementsByClassName('seach-n1')[0].innerHTML="";
                if(search_product){
                  document.getElementsByClassName('seach-n1')[0].style.display="block";
                   for (var i = 0; i<data.length; i++) {
                     document.getElementsByClassName('seach-n1')[0].innerHTML+='<div class="seach-item" onclick="addproductorder('+data[i].id+')"><div>'+data[i].name+'</div><div><span style="font-size: 13px;">'+data[i].Ma_sp+'</span><span class="seach-c1" style="margin-left:5px;">'+data[i].number+'</span><span class="seach-c1" style="margin-left:5px;">'+data[i].price.price_sell+'</span></div></div>';
                    }
                }
                else {
                  document.getElementsByClassName('seach-n1')[0].style.display="none";
                }
              },
              error:function(data){
                console.log(data);
              }
            });
}
function total_detail_order(id_product){
	let y=document.getElementById('table_detail_edit').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
	for(var i=0;i<y.length;i++){
		if(id_product==y[i].getAttribute('data-id')){
			let number=parseInt(y[i].getElementsByTagName('input')[0].value);
          let total=Math.round(number*y[i].getElementsByTagName('input')[1].value-number*y[i].getElementsByTagName('input')[1].value*y[i].getElementsByTagName('input')[2].value/100);

          y[i].getElementsByTagName('td')[5].textContent=total;
		}
	}
}
function addproductorder(id_product){
	let y=document.getElementById('table_detail_edit').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
	let check=true;
	for(var i=0;i<y.length;i++){
		if(id_product==y[i].getAttribute('data-id')){
			let number=parseInt(y[i].getElementsByTagName('input')[0].value)+1;
			y[i].getElementsByTagName('input')[0].value=number;
			total_detail_order(id_product);
             document.getElementsByClassName('seach-n1')[0].style.display="none";
             check=false;
		}
	}

	if(check==true){
              console.log(3);
		   $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'get',
              url:'http://localhost/karaoke/products/'+id_product,
              success: function (data) {
                 let x=document.getElementById('table_detail_edit').getElementsByTagName('tbody')[0]
                 x.innerHTML+='<tr data-id="'+data.id+'"><td data-id="'+data.unit.id+'">'+data.Ma_sp+'</td><td>'+data.name+'</td><td><div class="quantity"><input type="number"  class="form-control text-right" value="1" onkeyup="number0(this)" ></div></td><td style="display: flex;"><input type="" name="" class="form-control text-right" value="'+data.price.price_sell+'"data-id="'+data.price.id+'"disabled></td><td class="text-right"><input type="" name="" class="form-control text-right"  value="0" onkeyup="number12(this)"></td><td class="text-right">'+data.price.price_sell+'</td><td><i class="fas fa-trash del-pro-input" style="font-size: 13px; color: #2a6496" onclick="deleteproductdetailorder('+data.id+')"></i></td></tr>'
                 document.getElementsByClassName('seach-n1')[0].style.display="none";
              },
              error: function(data){
                console.log(data);
              }
            });
		
	}
  
}
function PrintfInOrder(id_order){
	 $.ajax({
        type: 'GET',
        url: 'http://localhost/karaoke/orders/printf/'+id_order,
        dataType: 'html',
        success: function (html) {
            w = window.open("","blank","height=800,width=800,modal=yes,alwaysRaised=yes");
            w.document.write(html);
            w.document.close();
            w.window.print();
            w.window.close();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
function deleteproductdetailorder(id){
	let y=document.getElementById('table_detail_edit').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
	for(var i=0;i<y.length;i++){
		if(id==y[i].getAttribute('data-id')){
             y[i].remove();
             break;
		}
	}
}
function number0(e){
   if(e.value==""){
   	e.value=1;
   }
    number_total21(e);
}
function number12(e){
   if(e.value==""){
   	e.value=0;
   }
   number_total212(e);
}
function number1(e){
   if(e.value==""){
   	e.value=0;
   }
   number_total21(e);
}
function number_total21(e){
  let id = e.parentElement.parentElement.parentElement.getAttribute("data-id");
  let element =document.querySelector('[data-id="'+id+'"]');
  console.log(e.parentElement.parentElement.parentElement);
  let x=element.getElementsByTagName('input');
  total=x[0].value*x[1].value-x[0].value*x[1].value*x[2].value/100;
  let td=element.getElementsByTagName('td');
  td[5].textContent=numberWithCommas(total);
}
function number_total212(e){
  let id = e.parentElement.parentElement.getAttribute("data-id");
  let element =document.querySelector('[data-id="'+id+'"]');

  let x=element.getElementsByTagName('input');
  total=x[0].value*x[1].value-x[0].value*x[1].value*x[2].value/100;
  let td=element.getElementsByTagName('td');
  td[5].textContent=numberWithCommas(total);
}
  function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
  }
</script>
@endsection
@extends('layouts.master')
@section('content')
<div class="form-inline" style="" >
			<form method="get" action='{{ url("/thongke/search")}}'>
            <div class="form-group"  style="position: relative;">
            	<label>Từ ngày</label>
             	<input type="text" name="time_start" class="form-control"id="datetimepicker4"  value="<?php if(isset($time_start)) echo $time_start;?>">
             	<label>đến</label>
            </div>
            <div class="form-group"  style="position: relative;">
             	<input type="text" name="time_to" class="form-control"id="datetimepicker5" value="<?php if(isset($time_to)) echo $time_to;?>" >
            </div>
            <div class="form-group" >
             	
             	 <button class="btn btn-primary">Tìm Kiếm</button>
            </div>
          </form>
</div>
<div class="profit-main-body" style="padding: 10px">
		    <div class="row" >
					<div class="col-lg-3 mr-t1">
						<div class="list-bs-1" style="border: 1px dashed #000; overflow: hidden;">
							<i class="fa fa-tags btn btn-w2" style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff" aria-hidden="true"></i>
							<span class="dg-2" style="font-size: 16px;">{{$data_order->total()}}</span>
							<span class="dg-3">ĐƠN HÀNG</span>
						</div>
					</div>
					<div class="col-lg-3 mr-t1">
						<div class="list-bs-1" style="border: 1px dashed #000; overflow: hidden;">
							<div>
							<i class="fa fa-cart-arrow-down btn btn-w2" style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff" aria-hidden="true"></i>
						    </div>
						    <div>
							<span class="dg-2" style="font-size: 16px;">{{number_format($total_order)}}</span>
							<span class="dg-3">TỔNG THU </span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 mr-t1">
						<div class="list-bs-1" style="border: 1px dashed #000; overflow: hidden;">
							<div>
							<i class="fa fa-money btn btn-w2" style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff" aria-hidden="true"></i>
							</div>
							<div style="overflow: hidden;">
							<span class="dg-2" style="font-size: 16px;">{{number_format($total_time)}}</span>
							<span class="dg-3">TIỀN GIỜ</span>
						    </div>
						</div>
					</div>
					<div class="col-lg-3 mr-t1">
						<div class="list-bs-1" style="border: 1px dashed #000; overflow: hidden;">
							<i class="fa fa-money btn btn-w2" style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff" aria-hidden="true"></i>
							<div style="overflow: hidden;">
								<span class="dg-2" style="font-size: 16px;">{{number_format($total_product)}}</span>
								<span class="dg-3">TIỀN HÀNG HÓA</span>
						    </div>
						</div>
					</div>
					<div class="col-lg-3 mr-t1">
						<div class="list-bs-1" style="border: 1px dashed #000; overflow: hidden;">
							<i class="fa fa-money btn btn-w2" style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff" aria-hidden="true"></i>
							<div style="overflow: hidden;">
								<span class="dg-2" style="font-size: 16px;">{{number_format($ck)}}</span>
								<span class="dg-3">TIỀN CHIẾT KHẤU</span>
						    </div>
						</div>
					</div>
					<div class="col-lg-3 mr-t1">
						<div class="list-bs-1" style="border: 1px dashed #000; overflow: hidden;">
							<i class="fa fa-money btn btn-w2" style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff" aria-hidden="true"></i>
							<div style="overflow: hidden;">
								<span class="dg-2" style="font-size: 16px;">{{number_format($VAT)}}</span>
								<span class="dg-3">VAT</span>
						    </div>
						</div>
					</div>
					<div class="col-lg-3 mr-t1">
						<div class="list-bs-1" style="border: 1px dashed #000; overflow: hidden;">
							<i class="fa fa-money btn btn-w2" style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff" aria-hidden="true"></i>
							<div style="overflow: hidden;">
								<span class="dg-2" style="font-size: 16px;">{{number_format($total_order-$VAT)}}</span>
								<span class="dg-3">DOANH THU</span>
						    </div>
						</div>
					</div>
		    </div>
	     </div>
</div>
<div class="content" >
			<div class="breadcrumb" style=" display: none;">
				<a>
	                <i class="fa fa-arrow-left"></i>
				     Hàng Hóa
				</a>
				<span style="font-size: 14px; font-weight: 500; display: inline-block; padding: 5px;color: #337ab7">Thêm mới</span>
			</div>
			<div class="form_s1 " style="margin-top: 20px; display: none;">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-9" style="padding-left: 15px;
						padding-right: 15px;">
							<div class="form-group row mr-b1" >
									<label class="col-lg-3">Nhà Cung Cấp</label>
									<div class="col-lg-9" style="display: flex;">
										<input type="" name="" class="form-control">
										<button class="btn "><i class="fa fa-plus-circle"></i></button>
									</div>
							</div>
						</div>	
					</div>
					<div class="col-lg-12">
						<div class="col-lg-9" style="padding-left: 15px;
						padding-right: 15px;">
							<div class="form-group row mr-b1" >
									<label class="col-lg-3">Ngày Nhập</label>
									<div class="col-lg-9">
										<input type="text" name="" class="form-control" id="datetimepicker6">
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
												<input type="" name="" class="form-control" placeholder="Tìm Kiếm Theo Tên Sản Phẩm">
												<div class="seach-n1" style="display: none;">
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
									<div class="col-lg-6">
										<input type="" name="" class="form-control">
									</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
			<div class="list_item_table mr-t1" style="background-color: #FFF ; padding-top: 20px;  ">
			    <table class="table">
					<thead class="thead-light" style="background-color: #0d6efd47">
						<tr>
							<th>Mã Đơn Hàng</th>
							<th>Ngày bán</th>
							<th>Tiền giờ</th>
							<th>Tiền hàng hóa</th>
							<th>Tiền chiết khấu</th>
							<th>VAT</th>
							<th>Tổng tiền</th>
						</tr>
					</thead>  
					<tbody>
						@foreach($data_order as $value)
						<tr>
							<td><a href="">{{$value->code_order}}</a></td>
							<td>{{$value->created_at}}</td>
							<td><?php
                                   $total=0;
                                   $total_product=0;
                                   $total_time=0;
                                   $VAT=0;
                                   foreach($value->timemoney as $item){
                                   	  $a=strtotime($item->time_finish)-strtotime($item->time_start);
                                   	  $total+=ceil(round($item->price_time/60*round($a/60))-round($item->price_time/60*round($a/60))*$item->discount_time/100);
                                   	   $total_time+=ceil(round($item->price_time/60*round($a/60))-round($item->price_time/60*round($a/60))*$item->discount_time/100);;
                                   }
                                   foreach ($value->detailorder as $item ) {
                                   	    $total+=ceil($item->price->price_sell*$item->number-$item->price->price_sell*$item->number*$item->discount_product/100);
                                   	    $total_product+=ceil($item->price->price_sell*$item->number-$item->price->price_sell*$item->number*$item->discount_product/100);
                                   	 
                                   }
                                   $VAT=ceil($total/100*$value->VAT);
                                   $total=ceil($total+$total/100*$value->VAT-$total/100*$value->discount_order);

                                 ?>
                             
							{{number_format($total_time)}}đ</td>
							<td>{{number_format($total_product)}}</td>
							<td>{{number_format($total_time-$total+$total_product+$VAT)}}</td>
							<td>{{number_format($VAT)}}</td>
							<td>{{number_format($total)}}</td>
						</tr>
					    @endforeach
					</tbody>
					<tfoot >
						<tr>
		                    <td colspan="100">
		                        <div class="row">
		                            <div class="col-md-4 col-xs-6 mt10">
		                                Kết quả từ {{$data_order->firstItem()}}-{{$data_order->lastItem()}} trên tổng {{$data_order->total()}}
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
											            <a class="page-link" href="{{ $data_order->url(1) }}"></a>
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
</script>
@endsection
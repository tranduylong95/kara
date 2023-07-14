@extends('layouts.master')
@section('content')

        <div class="form-inline" >
			
            <div class="form-group" >
               <div style="display: flex;">
               <input type="text" name="" class="form-control" placeholder="Nhập  tên nhân viên">
               <button class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>Tìm</button>
               </div>
            </div>
            
            <div  class="form-group  text-right">
            	<a class="btn btn-primary" href="{{url('employee/create')}}">&nbsp;Thêm mới nhân viên</a>
            </div>
        </div>
        <div class="content" >
        	<div class="breadcrumb" style="display: none;">
				<a  onclick="close_create_employee_FE()">
                <i class="fa fa-arrow-left"></i>
			    Quay lại
				</a>
				<span style="font-size: 14px; font-weight: 500; display: inline-block; padding: 5px;color: #337ab7">Nhân viên</span>
			</div>
			<div class="form_s1" style="margin-top: 20px;display: none; " id="form_room">
				<div class="row">
					<div class="col-lg-12 row" style="border-bottom:1px solid #eee;">
						<div class="col-lg-6">
							<div class="pd-2">
								<span>Thông tin nhân viên</span>
							</div>
						</div>
						<div class="col-lg-6 text-right" style="margin-top: auto; margin-bottom: auto;">
							<button class="btn btn-primary" style="padding: 5px 20px 5px 20px;" >Lưu nhân viên</button>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group row" style="padding-left:20px; padding-top: 10px;">
							<label class="col-lg-3 col-form-label">Tên nhân viên</label>
							<div class="col-lg-5"> 
								<input type="text" name="NameRoom" class="form-control">
							</div>
						</div>
						<div class="form-group row" style="padding-left:20px; padding-top:20px;">
							<label class="col-lg-3 col-form-label">Tên tài khoản</label>
							<div class="col-lg-5"> 
								<input type="text" name="NameRoom" class="form-control">
							</div>
						</div>
						<div class="form-group row" style="padding-left:20px; padding-top:20px;">
							<label class="col-lg-3 col-form-label">Mật khẩu</label>
							<div class="col-lg-5"> 
								<input type="password" name="NameRoom" class="form-control">
							</div>
						</div>
						<div class="form-group row" style="padding-left:20px; padding-top:20px;">
							<label class="col-lg-3 col-form-label">Số điện thoại/Email</label>
							<div class="col-lg-5"> 
								<input type="password" name="NameRoom" class="form-control">
							</div>
						</div>
						<div class="form-group row" style="padding: 20px;">
							<label class="col-lg-3 col-form-label">Chức vụ</label>
							<div class="col-lg-5"> 
								<select class="form-select" id="select_area">
									<option value="0">Admin</option>
								    <option value="1">nhân viên</option>
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
								<th>Tên nhân viên</th>
								<th class="text-center">Chức vụ</th>
								<th class="text-center">Tình trạng</th>
								<th class="text-center">Thao Tác</th>
							</tr>
						</thead> 
						<tbody>
							@foreach($data as $value)
							<tr>
								<td>{{$value->name}}</td>
								<td class="text-center"><?php if($value->rank==0){ echo "ADMIN";} else{ echo "nhân viên";}?></td>
								<td class="text-center"><?php if($value->status==0){ echo "Tạm khóa";} else{ echo "Đang hoạt động";}?></td>
								<td class="text-center">
									 @if(Auth::user()->rank==0)
									<a href="{{ url('employee/edit',['id'=>$value->id]) }}"><i class="fa fa-pencil-square-o href" style="color: #2a6496;cursor: pointer;font-size: 15px;"  aria-hidden="true"></i></a>

									<a href="{{ url('employee/delete',['id'=>$value->id]) }}">
									<i class="fa fa-trash href" style="color: #2a6496;cursor: pointer; font-size: 15px;" aria-hidden="true"></i>
								    </a>
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
		                                Kết quả từ {{$data->firstItem()}}-{{$data->lastItem()}} trên tổng {{$data->total()}}
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
											            <a class="page-link" href="{{ $data->url(1) }}"></a>
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
        	
        </div>
<script type="text/javascript">
	function form_add_fe() {
	   document.getElementById('form_room').style.display="block";
	   document.getElementsByClassName('breadcrumb')[0].style.display="block";
	   document.getElementsByClassName('form-inline')[0].style.display="none";
	   document.getElementById('list_room').style.display="none";

	}
	function close_create_employee_FE() {
	   document.getElementById('form_room').style.display="none";
	   document.getElementsByClassName('breadcrumb')[0].style.display="none";
	   document.getElementsByClassName('form-inline')[0].style.display="block";
	   document.getElementById('list_room').style.display="block";
	}


</script>
@endsection
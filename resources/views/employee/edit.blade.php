@extends('layouts.master')
@section('content')
        
        <div class="content" >
        	<div class="breadcrumb" >
				<a href="{{ url('employee') }}">
                <i class="fa fa-arrow-left"></i>
			    Quay lại
				</a>
				<span style="font-size: 14px; font-weight: 500; display: inline-block; padding: 5px;color: #337ab7">Nhân viên</span>
			</div>
			<div class="form_s1" style="margin-top: 20px;" id="form_room">
				<div class="row">
					<form method="post" action="{{ url('employee/edit',['id'=>$data->id])}}">
						<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						<div class="col-lg-12 row" style="border-bottom:1px solid #eee;">
							<div class="col-lg-6">
								<div class="pd-2">
									<span>Thông tin nhân viên</span>
								</div>
							</div>
							<div class="col-lg-6 text-right" style="margin-top: auto; margin-bottom: auto;">
								<button class="btn btn-primary" style="padding: 5px 20px 5px 20px;" type="submit" >Lưu nhân viên</button>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group row" style="padding-left:20px; padding-top: 10px;">
								<label class="col-lg-3 col-form-label">Tên nhân viên</label>
								<div class="col-lg-5"> 
									<input type="text" name="name" class="form-control" value="{{$data->name}}" required>
								</div>
							</div>
							<div class="form-group row" style="padding-left:20px; padding-top:20px;">
								<label class="col-lg-3 col-form-label">Tên tài khoản</label>
								<div class="col-lg-5"> 
									<input type="text" name="account" class="form-control" value="{{$data->account}}" required>
									<div class="error" style="font-size: 13px;color: red;"><?php if ($errors->has('account')){echo $errors->first('account') ;}?></div>
								</div>
							</div>
							
							<div class="form-group row" style="padding-left:20px; padding-top:20px;">
								<label class="col-lg-3 col-form-label">Số điện thoại/Email</label>
								<div class="col-lg-5"> 
									<input type="text" name="phone" class="form-control" value="{{$data->phone}}" required>
							</div>
							</div>
							<div class="form-group row" style="padding-left:20px; padding-top:20px;">
								<label class="col-lg-3 col-form-label">Chức vụ</label>
								<div class="col-lg-5"> 
									<select class="form-select" name="rank">

										<option value="0" <?php if($data->rank==0){ echo "selected";}?>>Admin</option>
									    <option value="1" <?php if($data->rank==1){ echo "selected";}?>>nhân viên</option>
								    </select>
								</div>
							</div>
								<div class="form-group row" style="padding-left:20px; padding-top:20px;padding-bottom: 20px;">
								<label class="col-lg-3 col-form-label">Trạng thái</label>
								<div class="col-lg-5"> 
									<select class="form-select" name="status">

										<option value="0" <?php if($data->status==0){ echo "selected";}?>>Không hoạt động</option>
									    <option value="1" <?php if($data->status==1){ echo "selected";}?>>Hoạt động</option>
								    </select>
								</div>
							</div>						
					    </div>
				    </form>
				</div>
			</div>
        	
        	
        </div>


@endsection
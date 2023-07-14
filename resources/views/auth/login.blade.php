@extends('auth.layout')
@section('auth')
	                    <div class="row">
				       	  	  <div style="background-color: #E5E1E2; text-align: center; border-radius: 5px;">
				       	  	  	 <img src="{{ asset('public/image/logo2.png')}}" style="width: 70%;d" >
				       	  	  	 
				       	 </div>
				       	</div>
				       	<div class="row">
				       		<div style=" background-color: #E5E1E2; margin-top: 10px;border-radius: 5px;">
				       			<h3 class="text-center pd1-10"style="font-family: 'EB Garamond', serif; font-size: 23px; padding: 10px;">ĐĂNG NHẬP PHẦN MỀM</h3>
				       			<div class="login" >
				       				<form class="form-horizontal" method="post" action ="{{url('login')}}">
				       				   @csrf
				       				   <div class="form-group" style="margin-top: 5px; position: relative;">
										    <input type="text" class="form-control pd-10"  placeholder="Tên đăng nhập/Số điện thoại" name="account" required>
										    <img src="{{ asset('public/image/icontaikhoan.png')}}" style="width: 30px;position: absolute;top:5px; right: 5px;">
										    <div  class="form-text" style="color: red;"><?php if(isset($error_account)){ echo $error_account;}?></div>
										</div>
										<div class="form-group" style="margin-top: 5px;position: relative;">
										    <input type="password" class="form-control pd-10"  placeholder="Mật Khẩu" name="password" required>
										    <img src="{{ asset('public/image/iconmatkhau.png')}}" style="width: 30px;position: absolute;top:5px; right: 5px;">
										    <div class="form-text" style="color: red;"><?php if(isset($error_password)){ echo $error_password;}?></div>
										</div>
										<div class="form-group" style="margin-top: 5px;">
										    <button class="btn btn-primary  btn-block" style="width: 100%; margin-bottom: 10px;" type="submit"> ĐĂNG NHẬP</button>
										    <a  href="{{ url('register')}}" class="btn-primary btn" style="width: 100%; display: none;"> ĐĂNG KÝ</a>
										</div>
										<div class="form-group" style="margin-top: 5px; white-space: nowrap;">
											
											<div class="col-lg-6 col-md-6 col-sm-6 " style="padding: 0px; font-size: 15px;display: inline-block;margin:0px;">
											    <input type="checkbox" name="" checked>
											    <label>Duy trì đăng nhập</label>
											</div>
											<div class="p-0 col-lg-6 col-md-6 col-sm-6 " style="font-size: 15px;display: inline-block;">
											    <span style="color: #2a6496; cursor: pointer;">Quên mật khẩu<span>
											 </div>		
										</div>
										<div class="form-group pd-10" style="margin-top: 5px;">
											<h4 class="text-center" style="color: red; ">Hotline Hỗ Trợ : 0963.22.87.87<h4>	
										</div>
				       				</form>
				       			</div>
				       			
				       		</div>
				       	</div>
@endsection
@extends('auth.layout')
@section('auth')
	<div class="row">
		<div style="background-color: #E5E1E2; text-align: center; border-radius: 5px;">
					       	  	  	 <h2 style="font-family: 'EB Garamond', serif; font-size: 23px; padding: 10px;">ĐĂNG KÝ PHẦN MỀM</h2>
		 </div>
	</div>
   	<div class="row">
   		<div style=" background-color: #E5E1E2; margin-top: 10px;border-radius: 5px;">
   			<div class="register">
   				<form method="post" class="form-horizontal" action="{{url('register')}}">
   					@csrf
   					<div class="form-group" style="margin-top: 5px;">
   						<label>Tên cửa hàng:</label>
					    <input type="text" class="form-control" name="NameCompany">
					    <div  class="form-text"><?php if(isset($errors)){ echo $errors->first('NameCompany');}?></div>
					</div>
					<div class="form-group" style="margin-top: 5px;">
   						<label>Chi nhánh :</label>
					    <input type="text" class="form-control" name="NameCompanyChild">
					    <div  class="form-text"><?php if(isset($errors)){ echo $errors->first('NameCompanyChild');}?></div>
					</div>
					<div class="form-group" style="margin-top: 5px;">
   						<label>Địa chỉ:</label>
					    <input type="text" class="form-control" name="AdressCompanyChild" >
					    <div i class="form-text"><?php if(isset($errors)){ echo $errors->first('AdressCompanyChild');}?></div>
					</div>
					<div class="form-group" style="margin-top: 5px;">
   						<label>Số điện thoại:</label>
					    <input type="text" class="form-control" name="Phone">
					    <div  class="form-text"><?php if(isset($errors)){ echo $errors->first('Phone');}?></div>
					</div>
					<div class="form-group" style="margin-top: 5px;">
   						<label>Email:</label>
					    <input type="email" class="form-control" name="Email" >
					    <div  class="form-text"><?php if(isset($errors)){ echo $errors->first('Email');}?></div>
					</div>
					<div class="form-group" style="margin-top: 5px;">
   						<label>Tên tài khoản:</label>
					    <input type="text" class="form-control" name="Account">
					    <div  class="form-text"><?php if(isset($errors)){ echo $errors->first('Account');}?></div>
					</div>
					<div class="form-group" style="margin-top: 5px;">
   						<label>Mật Khẩu:</label>
					    <input type="password" class="form-control" name="Password">
					    <div  class="form-text"><?php if(isset($errors)){ echo $errors->first('Password');}?></div>
					</div>
					<div class="form-group" style="margin-top: 5px;">
					    <button class="btn-primary btn" style="width: 100%;" type="submit"> ĐĂNG KÝ</button>
					</div>
					<div class="form-group pd-10" style="margin-top: 5px;">
						<h4 class="text-center" style="color: red; padding: 10px; ">Hotline Hỗ Trợ : 0963.22.87.87<h4>	
					</div>
   				</form>
   			</div>
   		</div>
   	</div>
@endsection
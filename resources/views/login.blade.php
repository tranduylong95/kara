<!DOCTYPE html>
<html>
<head>
	<title>Phần mềm karaoke</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('public/bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.min.css')}}">
    <script  src="js/icoin.js" ></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css')}}">
</head>
	<body style="background-image:url('{{ asset('public/image/nen.jpg')}}');background-size: cover;">
	   <div class="container-fluid">
	       <div class="row">
	       	  <div class="col-lg-8"></div>
		       	  <div class="col-lg-4">
		       	  	<div class="main" style="padding: 30% 10px;">
			       	  	<div class="row">
				       	  	  <div style="background-color: #E5E1E2; text-align: center; border-radius: 5px;">
				       	  	  	 <img src="{{ asset('public/image/logo2.png')}}" style="width: 70%;display: none;" >
				       	  	  	 <h2 style="font-family: 'EB Garamond', serif; font-size: 23px; padding: 10px;">ĐĂNG KÝ PHẦN MỀM</h2>
				       	  	  </div>
				       	</div>
				       	<div class="row">
				       		<div style=" background-color: #E5E1E2; margin-top: 10px;border-radius: 5px;">
				       			<h3 class="text-center pd1-10"style="font-family: 'EB Garamond', serif; font-size: 23px; padding: 10px;">ĐĂNG NHẬP PHẦN MỀM</h3>
				       			<div class="login" >
				       				<form class="form-horizontal">
				       				   <div class="form-group" style="margin-top: 5px; position: relative;">
										    <input type="email" class="form-control pd-10" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên đăng nhập/Số điện thoại">
										    <img src="{{ asset('public/image/icontaikhoan.png')}}" style="width: 30px;position: absolute;top:5px; right: 5px;">
										    <div id="emailHelp" class="form-text"></div>
										</div>
										<div class="form-group" style="margin-top: 5px;position: relative;">
										    <input type="email" class="form-control pd-10" aria-describedby="emailHelp" placeholder="Mật Khẩu">
										    <img src="{{ asset('public/image/iconmatkhau.png')}}" style="width: 30px;position: absolute;top:5px; right: 5px;">
										    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
										</div>
										<div class="form-group" style="margin-top: 5px;">
										    <button class="btn btn-primary  btn-block" style="width: 100%; margin-bottom: 10px;"> ĐĂNG NHẬP</button>
										    <a class="btn-primary btn" style="width: 100%;"> ĐĂNG KÝ</a>
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
				       			<div class="register" style="display: none">
				       				<form class="form-horizontal">
				       					<div class="form-group" style="margin-top: 5px;">
				       						<label>Tên cửa hàng:</label>
										    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										    <div id="emailHelp" class="form-text"></div>
										</div>
										<div class="form-group" style="margin-top: 5px;">
				       						<label>Chi nhánh :</label>
										    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										    <div id="emailHelp" class="form-text"></div>
										</div>
										<div class="form-group" style="margin-top: 5px;">
				       						<label>Địa chỉ:</label>
										    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										    <div id="emailHelp" class="form-text"></div>
										</div>
										<div class="form-group" style="margin-top: 5px;">
				       						<label>Số điện thoại:</label>
										    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										    <div id="emailHelp" class="form-text"></div>
										</div>
										<div class="form-group" style="margin-top: 5px;">
				       						<label>Email:</label>
										    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										    <div id="emailHelp" class="form-text"></div>
										</div>
										<div class="form-group" style="margin-top: 5px;">
				       						<label>Tên tài khoản:</label>
										    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										    <div id="emailHelp" class="form-text"></div>
										</div>
										<div class="form-group" style="margin-top: 5px;">
				       						<label>Mật Khẩu:</label>
										    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										    <div id="emailHelp" class="form-text"></div>
										</div>
										<div class="form-group" style="margin-top: 5px;">
										    <button class="btn-primary btn" style="width: 100%;"> ĐĂNG KÝ</button>
										</div>
										<div class="form-group " style="margin-top: 5px; padding: 10px;">
											<h4 class="text-center" style="color: red;">Hotline Hỗ Trợ : 0963.22.87.87<h4>	
										</div>
				       				</form>
				       			</div>
				       		</div>
				       	</div>
		       	  	</div>
		       	  </div>
	       </div>
       </div>
	</body>
</html>
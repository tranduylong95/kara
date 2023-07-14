<!DOCTYPE html>
<html>
<head>
	<title>Phần mềm karaoke</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('public/bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.min.css')}}">
    <script  src=" {{ asset('public/js/icoin.js') }}" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/confetti.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css?v=').time() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/media.css?v=').time() }}">
	
</head>
<body style="background-color: #EEEEEE">
	<div class="head-title" style="padding: 0px;">
		<div class="container-fluid top-header" >
		   	<div class="row">
			   	  <div class="col-md-6" style="padding: 10px 0px 0px 10px;">
			   	  	 <img src="{{ asset('public/image/logo2.png')}}" style="width: 120px;height: 37px;">
			   	  	 <span style="color: red;"> - Hotline: 0963.22.87.87</span>
			   	  </div>
			   	  <div class="col-md-6">
			   	  	<ul class="nav justify-content-end">
			   	  		<li  class=""  >
				   	 		
				   	 		  <div class="dropdown-menu" style="padding: 0px;">
									   	    <ul class="list-group">
											    <li class="list-group-item" >
												  	<a href="" class="link-h1">
												  		<i class="fa fa-cube"></i>
												  		Danh sách sản phẩm
												  	</a>
											  	</li>
											  	 <li class="list-group-item" >
												  	<a href="" class="link-h1">
												  		<i class="fas fa-project-diagram"></i>
												  		Bảng Giá
												  	</a>
											  	</li>
											  	 <li class="list-group-item" >
												  	<a href="" class="link-h1">
												  		<i class="fa fas fa-file-alt"></i>
												  		Quản lý nhập hàng
												  	</a>
											  	</li>
											  	<li class="list-group-item" >
												  	<a href="" class="link-h1">
												  		<i class="fa fa-male"></i>
												  		Quản lý chuyển kho
												  	</a>
											  	</li>
											  	<li class="list-group-item" >
												  	<a href="" class="link-h1">
												  		<i class="fa fa-check-square-o"></i>
												  		Quản lý kiểm hàng
												  	</a>
											  	</li>
											  	<li class="list-group-item" >
												  	<a href="" class="link-h1">
												  		Danh sách xuất trả
												  	</a>
											  	</li>
											</ul>
							  </div>
				   	 	</li>
				   	 	<li class="" >
				   	 		<a class="link-h1 pd-2 d-block" style="color: #000"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				   	 			@if(Auth::check())
					   	 		 Xin chào,{{Auth::user()->name}}
					   	 		 @endif
					   	 		<i class="fa fa-caret-down"></i>
				   	 	    </a>
				   	 	    <div class="dropdown-menu" style="padding: 0px;">
								<ul class="list-group">
												    <li class="list-group-item" >
													  	<a href="{{ url('doimk') }}" class="link-h1">
													  			
													  	     Đổi mật khẩu
													  	</a>
											  	    </li>
												  	 
												  	
												  	<li class="list-group-item" >
													  	<a href="{{ url('logout')}}" class="link-h1">
													  		Logout
													  	</a>
												  	</li>
								</ul>
							</div>
				   	 	</li>
			   	  	</ul>
			   	  </div>
		   	</div>
	    </div>
		 <nav>
		   	 <ul class="nav">
		   	 	<li  class="">
		   	 		<a class="link-h1 pd-2 d-block" href="{{ url('dashboard') }}">
		   	 		  <i class="fa fa-dashboard"></i>
		   	 		  Tổng quan
		   	 	    </a>
		   	 	</li>
		   	 	<li class="">
		   	 		<a href="{{ url('products') }}"class="link-h1 pd-2 d-block" >
			   	 		<i class="fa fa-cubes"></i>
			   	 		 Hàng Hóa
		   	 	    </a>
		   	 	     <div class=""style=" z-index: 10000;position: absolute; display: none;">
							   	    <ul class="list-group">
									    <li class="list-group-item" >
										  	<a href="" class="link-h1">
										  		<i class="fa fa-cube"></i>
										  		Danh sách sản phẩm
										  	</a>
									  	</li>
									  	 <li class="list-group-item" >
										  	<a href="" class="link-h1">
										  		<i class="fas fa-project-diagram"></i>
										  		Bảng Giá
										  	</a>
									  	</li>
									  	 <li class="list-group-item" >
										  	<a href="" class="link-h1">
										  		<i class="fa fas fa-file-alt"></i>
										  		Quản lý nhập hàng
										  	</a>
									  	</li>
									  	<li class="list-group-item" >
										  	<a href="" class="link-h1">
										  		<i class="fa fa-male"></i>
										  		Quản lý chuyển kho
										  	</a>
									  	</li>
									  	<li class="list-group-item" >
										  	<a type="button" class="link-h1">
										  		<i class="fa fa-check-square-o"></i>
										  		Quản lý kiểm hàng
										  	</a>
									  	</li>
									  	<li class="list-group-item" >
										  	<a href="" class="link-h1">
										  		Danh sách xuất trả
										  	</a>
									  	</li>
									</ul>
					</div>
		   	 	</li>
		   	 	<li >
		   	 		<a  href="{{ url('room') }}"class="link-h1 pd-2 d-block">
		   	 			<i class="fa fa-gamepad"></i>
			   	 		Quản lý phòng
		   	 	    </a>
		   	 	</li>
		   	 	<li >
		   	 		<a href="{{ url('orders') }}"class="link-h1 pd-2 d-block">
		   	 			<i class="fa fa-newspaper-o"></i>
			   	 		Quản lý Hóa Đơn
		   	 	    </a>
		   	 	</li>
		   	 	<li >
		   	 		<a href="{{ url('employee') }}" class="link-h1 pd-2 d-block">
		   	 			<i class="fa fa-users"></i>
			   	 		Quản lý nhân viên
		   	 	    </a>
		   	 	</li>
		   	 	<li >
		   	 		<a href="{{url('thongke')}}"class="link-h1 pd-2 d-block">
	                   <i class="fa fa-bar-chart"></i>
		   	 		   Báo Cáo
		   	 	    </a>
		   	 	</li>
                <li >
		   	 		<a href="{{url('software')}}"class="link-h1 pd-2 d-block">
	                   <i class="fa fa-database"></i>
		   	 		   Karaoke
		   	 	    </a>
		   	 	</li>
		   	 </ul>
		 </nav>	
	</div>
	<div class="container-fluid " style="margin-top: 20px;">
		@yield('content')
	
	</div>
	
	<div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-footer">
		      	<select class="form-select" id="select_company_child">
		      		
		      	</select>
		      	<button type="button" class="btn btn-primary" onclick="SetUserComPanyChild()">Chuyển</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		      </div>
		    </div>
	  </div>
	</div>
</body>

<script type="text/javascript">

function list_data_select(elemet_id,data){
	while (elemet_id.hasChildNodes()) {
			elemet_id.removeChild(elemet_id.firstChild);
        }
        for (var i =0; i <data.length; i++) {
	        	elemet_id.innerHTML+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
	    }
}
function SetUserComPanyChild(){
	 $.ajax({
		headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    type: 'POST', //THIS NEEDS TO BE GET
	    url: 'SetUserCompanyChild',
	    data: {
	                "id_company_child": document.getElementById("select_company_child").value,
	          },
	    success: function (data) {
	      window.location.href= window.location.href;
          
	    },
	    error: function(data) { 
	          console.log(data);
	    }
	});
}
</script>
</html>
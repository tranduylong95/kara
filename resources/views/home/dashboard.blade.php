@extends('layouts.master')
@section('content')
   <div class="container-fluid" >
		<div class="content-h1">
			<div class="row">
				<div class="col-lg-3 mr-t1" >
					<div class="list-bs-1" >
						<i class="fa fa-tags btn btn-w2"  style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff"></i>
						<span class ="dg-2">{{COUNT($data_order)}}</span>
						<span class="dg-3">ĐƠN HÀNG</span>
					</div>
				</div>
				<div class="col-lg-3 mr-t1">
					<div class="list-bs-1">
						<i class="fa fa-cart-arrow-down btn btn-w2"  style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff"></i>
						<span class ="dg-2">{{number_format($total_order)}}</span>
						<span class="dg-3">DOANH THU TRONG NGÀY</span>
					</div>
				</div>
				<div class="col-lg-3 mr-t1">
					<div class="list-bs-1">
						<i class="fa fa-money btn btn-w2"  style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff"></i>
						<span class ="dg-2">{{number_format($total_time)}}</span>
						<span class="dg-3">TIỀN GIỜ</span>
					</div>
				</div>
				<div class="col-lg-3 mr-t1">
					<div class="list-bs-1" >
						<i class="fa fa-money btn btn-w2"  style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff"></i>
						<span class ="dg-2">{{number_format($total_product)}}</span>
						<span class="dg-3">TIỀN HÀNG HÓA</span>
					</div>
				</div>
				<div class="col-lg-3 mr-t1">
					<div class="list-bs-1" >
						<i class="fa fa-reply btn btn-w2"  style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff"></i>
						<span class ="dg-2">0</span>
						<span class="dg-3">HỦY TRẢ ĐỒ</span>
					</div>
				</div>
				<div class="col-lg-3 mr-t1">
					<div class="list-bs-1" >
						<i class="fa fa-reply-all btn btn-w2"  style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff"></i>
						<span class ="dg-2">{{$VAT}}</span>
						<span class="dg-3">VAT</span>
					</div>
				</div>
				<div class="col-lg-3 mr-t1">
					<div class="list-bs-1" >
						<i class="fa fa-money btn btn-w2"  style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff"></i>
						<span class ="dg-2">{{$ck}}</span>
						<span class="dg-3">CHIẾT KHẤU</span>
					</div>
				</div>
				<div class="col-lg-3 mr-t1">
					<div class="list-bs-1" >
						<i class="fa fa-crosshairs btn btn-w2"  style="margin-right: 10px; font-size: 24px; height:50px;float: left; background-color: blue; color: #fff"></i>
						<span class ="dg-2">{{count($room_active)}}/{{count($room)}}</span>
						<span class="dg-3">BÀN SỬ DỤNG</span>
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 10px;">
			<div class="row">
				<div class="col-lg-9">
					<canvas id="myChart"  style="height: 240px; background-color: #fff;"></canvas>
				</div>
				<div class="col-lg-3">
					<div class="hotline pd-1" >
						    <div style="display: inline-block;">
								<span class="dg-3" style="display: inline; color: #2980b9">HOTLINE :</span> 
								<span class="dg-3" style="display: inline; color: red;">1900 4515</span>
						    </div>
							<i class="fa fa-phone-square " style="color: #2980b9; font-size: 1.5em; float: right;"></i>
					</div>
					<div class="history">
						<span class="dg-3" style="color: #2980b9">HOẠT ĐỘNG GẦN ĐÂY</span>
						<div class="flex-1 history-sl"  >
							<span class="fa fa-cart-arrow-down bs"></span>
							<div>
								<span style="font-weight: 600 ;color: #2980b9;font-size: 18px;">Admin</span>
								<span>admin đã thay đổi giá tiền 2500 thanh 25000 </span>
						    </div>
						    <div class="time-history">
						    	<i class="fa fa-clock-o" style="color: color: #878787;"></i>
						    	<span style="color: #878787;">17 ngày trước</span>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
		data1=<?php echo json_encode($data_money);?>;
		console.log(data1);
			    const labels = [];	
					for (var i=6; i>=1; i--) {
						var d= new Date();
						d.setDate(d.getDate()-i);
						labels.push(d.toLocaleDateString("vi-VN",{day: "numeric",month:"numeric"}));
					}
				d= new Date();
				labels.push(d.toLocaleDateString("vi-VN",{day: "numeric",month:"numeric"}));
			    const data = {
			    labels: labels,
			    datasets: [{
			      label:'Tổng doanh thu các ngày trước',
			      backgroundColor: 'rgb(255, 99, 132)',
			      borderColor: 'rgb(255, 99, 132)',
			      data: data1,
			    }]
			  };

			  const config = {

			    type: 'bar',
			    data: data,
			    options: {}
			  };
			   const myChart = new Chart(
			    document.getElementById('myChart'),
			    config
			  );
</script>
@endsection
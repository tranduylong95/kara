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
			       	  	@yield('auth');
		       	  	</div>
		       	  </div>
	       </div>
       </div>
	</body>
</html>
@extends('layouts.master')
@section('content')
       
       
			<div class="form_s1" style="margin-top: 20px;" id="form_room">
				<div class="row">
					<form method="post" action="{{ url('doimk')}}">
						<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
						<div class="col-lg-12 row" style="border-bottom:1px solid #eee;">
							<div class="col-lg-6">
								<div class="pd-2">
									<span>Đổi mật khẩu</span>
								</div>
							</div>
							<div class="col-lg-6 text-right" style="margin-top: auto; margin-bottom: auto;">
								<button class="btn btn-primary" style="padding: 5px 20px 5px 20px;" type="submit" >Xác nhận</button>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group row" style="padding-left:20px; padding-top:20px;" required>
								<label class="col-lg-3 col-form-label">Mật Khẩu trước:</label>
								<div class="col-lg-5"> 
									<input type="password" name="password" class="form-control" required>
									<div class="error" style="font-size: 13px;color: red;"><?php if (isset($error)){echo $error;}?></div>

								</div>
								
							</div>
							
							<div class="form-group row" style="padding-left:20px; padding-top:20px; padding-bottom: 20px;" required>
								<label class="col-lg-3 col-form-label">Đổi mật khẩu:</label>
								<div class="col-lg-5"> 
									<input type="password" name="password_after" class="form-control" required>

								</div>

							</div>		
					    </div>
				    </form>
				</div>
			</div>
        	
        	
        </div>


@endsection
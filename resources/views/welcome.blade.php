<!DOCTYPE html>
<html>
<head>
    <title>Phần mềm karaoke</title>
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.min.css') }}">
    <script  src="{{asset('js/icoin.js')}}" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/media.css') }}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<body style="overflow:hidden;">
<nav>
    <div class="head-title">
        <div class="row" style="margin: 0px; padding: 5px;">
            <div class="col-lg-3" >
                <div style="position: relative; width: 100%;">
                    <form >
                        <div class="form-group" style="display: flex;" >
                           <button class="btn btn-w1" >
                              <i class="fa fa-search"></i>
                            </button>
                            <input type="text" name="" class="form-control  bor-1" placeholder="Tìm thực đơn...">
                            <button class="btn btn-w1"   style="background-color: #e7ebee;">
                                <i class="fas fa-keyboard" style="color: red;"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="seach-b1" style="display: none;">
                    <div class="seach-item">
                        <div>Súp kem gấu đỏ jas</div>
                        <div>
                            <span style="font-size: 13px;">HD00000001</span>
                            <span class ="seach-c1">6</span>
                            <span class="seach-c1">12,500</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">  
               <div class="nav-bar">
                  <ul class="nav">
                       <li class="item-w1">
                          <a class="btn btn-w2 mr-b1" data-bs-toggle="tooltip" data-bs-placement="bottom" title=""  >
                                <i class="fas fa-desktop"></i>
                          </a>
                      </li>
                       <li class="item-w1">  
                           <a class="btn btn-w2 mr-b1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Quay về trang quản lý">
                                <i class="fas fa-expand-arrows-alt"></i>
                           </a>
                       </li>
                       <li class="item-w1" style="display: block;"> 
                          <a class="btn btn-w2 mr-b1" data-bs-toggle="tooltip" data-bs-placement="bottom" title=""   >
                              <i class="fas fa-bars"></i>
                          </a>
                          <div class=""style=" z-index: 10000;position: absolute;right: 69px; display: none;">
                                <ul class="list-group">
                                    <li class="list-group-item" >
                                        <a href="" class="link-h1">
                                            <i class="fa fa-share"></i>
                                            Trả hang
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="link-h1">
                                            <i class="fa fa-pencil-square-o"></i>
                                            Xử lý đơn hàng
                                        </a>
                                     </li>
                                    <li class="list-group-item">
                                        <a class="link-h1">
                                            <i class="fa fa-qrcode"></i>
                                        QR-Pay
                                        </a>
                                   </li>
                                  <li class="list-group-item">
                                    <a class="link-h1">
                                        <i class="fa fa-plus-square"></i>
                                        Thêm mới hàng hóa
                                    </a>
                                  </li>
                                  <li class="list-group-item" style="border-top:1px solid #fff;">
                                    <a class="link-h1">
                                      <i class="fa fa-circle-o"></i>
                                     Mẫu in nhỏ
                                    </a>
                                  </li>
                                  <li class="list-group-item" style="border-bottom: 1px solid #fff;">
                                    <a class="link-h1">
                                       <i class="fa fa-dot-circle-o"></i>
                                        Mẫu in lớn
                                    </a>
                                  </li>
                                  <li class="list-group-item">
                                    <a class="link-h1">
                                    <i class="fa fa-check"></i>
                                    In sau khi thanh toán
                                    </a>
                                  </li>
                                  <li class="list-group-item">
                                    <a class="link-h1" >
                                  Không in ra hàng khi giá bán = 0</a>
                                  </li>
                                  <li class="list-group-item">
                                    <a class="link-h1">
                                       In 2 liền cho phiếu chế biến
                                    </a>
                                  </li>
                                  <li class="list-group-item" style="border-bottom:1px solid #fff;">
                                    <a class="link-h1"class="link-h1"class="link-h1">In 2 liền cho phiếu chế biến
                                    </a>
                                  </li>
                                  <li class="list-group-item">
                                    <a class="link-h1"class="link-h1">
                                        <i class="fa fa-reply-all"></i>
                                        Lịch sử hủy/trả đồ 
                                    </a>
                                  </li> 
                                  <li class="list-group-item">
                                    <a class="link-h1">
                                    <i class="fa fa-bar-chart"></i>
                                    Tổng kết cuối ngày
                                    </a>
                                  </li> 
                                </ul>
                           </div>
                       </li>
                       <li class="item-w1">
                           <a class="btn btn-w2 mr-b1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="">
                                <i class="fas fa-power-off"></i>
                           </a>
                           <div class=""style=" z-index: 10000;position: absolute;right: 17px; display: none;">
                               <ul class="list-group">
                                    <li class="list-group-item" >
                                        <a href="" class="link-h1">
                                            <i class="fa fa-share"></i>
                                            Đăng xuất
                                        </a>
                                    </li>
                                    <li class="list-group-item" >
                                        <a href="" class="link-h1">
                                            <i class="fa fa-share"></i>
                                            Quay về trang chủ
                                        </a>
                                    </li>
                                </ul>
                           </div>
                       </li>
                  </ul>
               </div>   
            </div>
        </div>
    </div>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7" >
                <div class="row deltail-bill-1" >
                    <div class="col-sm-12 pd-right-0" style="margin-top: 5px;">
                        <div style="background-color: #d9534f; border-radius: 3px; margin-bottom: 2px; cursor: pointer; float: right;">
                            <span style="font-size: 13px; color: white; padding: 5px;">
                            <i class="fa fa-clock-o"></i>&nbspTính Giờ
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12 deltail-bill pd-right-0 " >
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                  <th >TÊN HÀNG HÓA</th>
                                  <th class="hidden">ĐVT</th>
                                  <th >SL</th>
                                  <th class="text-center" style="width: 20%;min-width:80px;">Đơn Giá</th>
                                  <th class="text-center">Thành Tiền</th>
                                  <th style="width: 20px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td style="font-size: 12px;">APEROL SPRITZ</td>
                                  <td class="dg-1text-center hidden">Mark</td>
                                  <td width="110px;">
                                      <div style="display: flex; height: 30px;">
                                        <button class="btn btn-default pd-3">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="" class="form-control text-center"  >
                                        <button class="btn btn-default pd-3">
                                            <i class="fas fa-plus" aria-hidden="true"></i>
                                        </button>
                                      </div>
                                  </td>
                                  <td style="display: flex;">
                                    <input type="" name="" class="form-control text-center" style="height: 30px;">
                                    <i class="fa fas fa-gift pd-3 d-none d-sm-block d-sm-none d-md-block" style="vertical-align: middle; line-height: 30px;cursor: pointer; color:#2a6496;" data-toggle="modal" data-target="#move-room"></i>
                                  </td>
                                  <td class="text-center">300,000,000</td>
                                  <td ><span class="far fa-trash-alt" style="font-size: 13px; vertical-align: middle; color: blue;cursor: pointer;"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12 pd-right-0" >
                        <div class="over-bill pd-3"style="height: 225px; width: inherit;margin-bottom: 5px;">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"class="form-control" style="padding:0 5px 5px 5px;display: flex;">
                                     <input type="" name="" class="form-control"style="height: 35px;">
                                     <button class="btn-primary btn">a</button>
                                    </div>
                                    <div class="form-group"class="form-control" style="padding:0 5px 5px 5px;" >
                                     <input type="" name="" class="form-control" style="height: 35px;">
                                    </div>
                                    <div class="form-group"class="form-control" style="padding:0 5px 5px 5px;" >
                                     <input type="" name="" class="form-control" style="height: 35px;">
                                    </div>
                                    <div class="form-group"class="form-control" style="padding:0 5px 5px 5px;" >
                                     <input type="" name="" class="form-control" style="height: 35px;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row mr-b1">
                                        <label class="col-lg-7 " style="font-size: 15px;">Tổng thành tiền</label>
                                        <div class="col-lg-5 text-right">
                                            <span style="font-size: 1.125em;font-weight: 600;color: #8bc34a;">0</span>
                                        </div>
                                    </div>
                                    <div class="form-group row mr-b1">
                                        <label class="col-lg-7 " style="font-size: 15px;">Chiết Khấu
                                        </label>
                                        <div class="col-lg-5 text-right" style="display: flex;">
                                            <i class="fa fas fa-gift pd-3" style="color: #2a6496; line-height: 22px;cursor: pointer;" data-toggle="modal" data-target="#Extract"></i>
                                            <input type="" name="" class="form-control text-right" style="height: 28px;padding: 0px;" disabled value="0">
                                        </div>
                                    </div>
                                    <div class="form-group row mr-b1">
                                        <label class="col-lg-7 " style="font-size: 15px;">VAT-Phụ thu
                                            <button class="btn btn-primary" style="padding: 5px;">0</button>
                                            <button class="btn btn-primary" style="padding: 5px;">10%</button>
                                            <button class="btn btn-primary" style="padding: 5px;">?</button>
                                        </label>
                                        <div class="col-lg-5 text-right">
                                            <input type="" name="" class="form-control" style="height: 28px;">
                                        </div>
                                    </div>
                                    <div class="form-group row mr-b1">
                                        <label class="col-lg-7 " style="font-size: 15px;">Tổng cộng</label>
                                        <div class="col-lg-5 text-right">
                                            <span class="pd-3"style="background-color: red;color: white;font-weight: 700; font-size: 20px; border-radius: 3px;">0</span>
                                        </div>
                                    </div>
                                    <div class="form-group row mr-b1">
                                        <label class="col-lg-7 " style="font-size: 15px;">Khách đưa</label>
                                        <div class="col-lg-5 text-right">
                                            <input type="" name="" class="form-control text-right" style="height: 28px;">
                                        </div>
                                    </div>
                                    <div class="form-group row mr-b1">
                                        <label class="col-lg-7 " style="font-size: 15px;">Tiền thừa</label>
                                        <div class="col-lg-5 text-right">
                                            <span class="pd-3 btn-primary" style="color: white;font-weight: 700; font-size: 20px; border-radius: 3px;">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1" >
                            <div class="flex-1" style=" width: 70%; ">
                                <div  style="width: calc(50% - 2.5px)">
                                    <button class="btn-t1 btn pd-1" style="margin-bottom: 5px;">
                                        <span class="fa fa-retweet"></span>
                                        <span>Chuyển Bàn</span> 
                                   </button>
                                    <button class="btn-t1 btn pd-1">
                                        <span class="fa fa-cut"></span>
                                        <span>Tách Bàn</span> 
                                    </button>
                                </div>
                                <div style="width: calc(50% - 2.5px); margin-left: 5px;">
                                    <button class="btn-t1 btn pd-1" style="margin-bottom: 5px;">
                                        <span class="fa fa-print"></span>
                                        <span>Báo chế biến</span> 
                                    </button>
                                    <button class=" btn pd-1 btn-warning" style=" color: #fff ">
                                        <span class="fa fa-print"></span>
                                        <span>Tạm tính</span> 
                                    </button>
                                </div>
                            </div>
                            <div style="height: 81px; width: calc( 30% - 5px); margin-left: 5px;">
                                <button class="btn btn-t1" style="height: inherit; background-color: #dd191d;">
                                   <span>Thanh Toán<span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" >
                <table width="100%" style="margin-top: 10px; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td width="50%" style="border: 5px solid #fff;">
                                <button class="btn btn-t1" >
                                    <span class="fa fa-crosshairs" ></span>
                                    <span >Phòng Ban [1/30]</span>
                                </button>
                            </td>
                            <td width="50%" style="border: 5px solid #fff;">
                                <button class="btn  btn-t1" >
                                    <span class="fa fa-cutlery" ></span>
                                    <span >Thực đơn</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="product-list list-r-1" style="display: none;">
                    <div class="col-12">
                        <div class="row mr-0">
                            <div class=" col-lg-3 pd-3">
                                <button class="btn btn btn-primary" style="width: 100%;">Tat ca</button>
                            </div> 
                            <div class=" col-lg-3 pd-3">
                                <button class="btn btn-primary" style="width: 100%;">Tat ca</button>
                            </div> 
                            <div class=" col-lg-3 pd-3">
                                <button class="btn btn-primary" style="width: 100%;">Tat ca</button>
                            </div> 
                            <div class=" col-lg-3 pd-3">
                                <button class="btn btn-primary" style="width: 100%;">Tat ca</button>
                            </div> 
                             <div class=" col-lg-3 pd-3">
                                <button class="btn btn-primary" style="width: 100%;">Tat ca</button>
                            </div> 
                        </div>   
                     </div>
                    <div class="product-item" >
                           <img src="karaoke.jpg" >
                           <span style="position: absolute;top:0;right: 0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;">300,000</span>
                            <div style="position: absolute;bottom:0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;width: 100%;">a</div>
                    </div>
                    <div class="product-item" >
                           <img src="karaoke.jpg" >
                           <span style="position: absolute;top:0;right: 0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;">300,000</span>
                            <div style="position: absolute;bottom:0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;width: 100%;">a</div>
                    </div>
                    <div class="product-item" >
                           <img src="karaoke.jpg" >
                           <span style="position: absolute;top:0;right: 0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;">300,000</span>
                            <div style="position: absolute;bottom:0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;width: 100%;">a</div>
                    </div>
                    <div class="product-item" >
                           <img src="karaoke.jpg" >
                           <span style="position: absolute;top:0;right: 0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;">300,000</span>
                            <div style="position: absolute;bottom:0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;width: 100%;">a</div>
                    </div>
                    <div class="product-item" >
                           <img src="karaoke.jpg" >
                           <span style="position: absolute;top:0;right: 0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;">300,000</span>
                            <div style="position: absolute;bottom:0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;width: 100%;">a</div>
                    </div>
                    <div class="product-item" >
                           <img src="karaoke.jpg" >
                           <span style="position: absolute;top:0;right: 0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;">300,000</span>
                            <div style="position: absolute;bottom:0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;width: 100%;">a</div>
                    </div>
                </div>
                <div class=" product-list list-r-1" >
                    <div class="col-12">
                        <div class="row mr-0">
                            <div class=" col-lg-3 pd-3">
                                <button class="btn btn btn-primary" style="width: 100%;">Tat ca</button>
                            </div> 
                            <div class=" col-lg-3 pd-3">
                                <button class="btn btn-primary" style="width: 100%;">Tat ca</button>
                            </div> 
                            <div class=" col-lg-3 pd-3">
                                <button class="btn btn-primary" style="width: 100%;">Tat ca</button>
                            </div> 
                            <div class=" col-lg-3 pd-3">
                                <button class="btn btn-primary" style="width: 100%;">Tat ca</button>
                            </div> 
                             <div class=" col-lg-3 pd-3">
                                <button class="btn btn-primary" style="width: 100%;">Tat ca</button>
                            </div> 
                        </div>   
                     </div>
                    <div class="room-item active-room" >
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                    </div>  
                    <div class="room-item">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                    </div>  
                    <div class="room-item" >
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                    </div>  
                    <div class="room-item" >
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                    </div>  
                    <div class="room-item" >
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                    </div>  
                    <div class="room-item" >
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                    </div>  
                    <div class="room-item" >
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                    </div>  
                </div>  
            </div>
        </div>
    </div>
    <div class="pop-s1" style="display: none;" >
        <div class="pop">
            <div class="pop-content" style="padding: 5px; ">
                 <div class="form-group">
                    <label style="font-size: 13px;">Chiết khấu</label>
                    <div class="input-group">
                        <input type="text" name="" class="form-control">
                        <span class="btn btn-primary">%</span>
                    </div>
                </div>
                <div style="display: flex; margin-top: 10px;">
                    <span class="btn btn-primary" style="border-radius: 0px;">5%</span>
                    <span class="btn btn-primary" style="border-radius: 0px;">10%</span>
                    <span class="btn btn-primary" style="border-radius: 0px;">15%</span>
                    <span class="btn btn-primary" style="border-radius: 0px;">20%</span>
                    <span class="btn btn-primary" style="border-radius: 0px;">25%</span>
                    <span class="btn btn-primary" style="border-radius: 0px;">30%</span>
                    <span class="btn btn-primary" style="border-radius: 0px;">50%</span>
                    <span class="btn btn-primary" style="border-radius: 0px;">100%</span>
                </div>
                <div class="arrow" style="position: absolute;top:-8px;left: 50%"></div>
             </div>
        </div>
    </div>
    <div class="modal fade" id="Extract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chiết khấu</h5>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border: 0px;">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Chiết Khấu(%)</label>
                    <input type="" name="" class="form-control text-right">
                    <div style="display: flex; margin-top: 10px;">
                        <span class="btn btn-primary" style="border-radius: 0px;">5%</span>
                        <span class="btn btn-primary" style="border-radius: 0px;">10%</span>
                        <span class="btn btn-primary" style="border-radius: 0px;">15%</span>
                        <span class="btn btn-primary" style="border-radius: 0px;">20%</span>
                        <span class="btn btn-primary" style="border-radius: 0px;">25%</span>
                        <span class="btn btn-primary" style="border-radius: 0px;">30%</span>
                        <span class="btn btn-primary" style="border-radius: 0px;">50%</span>
                        <span class="btn btn-primary" style="border-radius: 0px;">100%</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-xl" id="move-room" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chuyển Bàn</h5>
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border: 0px;">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item active-room" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-2 pd-3">
                            <div class="room-item" style="width: 100%;">
                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">B.101</div>
                             <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;">22:06</div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
   function pop_1 (e) {
    var x=e.getBoundingClientRect();
    var clientX = x.left;
    var clientY = x.top;
    var pop = document.getElementsByClassName("pop-s1");
    var height=e.clientHeight;
    var width=pop[0].clientWidth;
    pop[0].style.display="block";
    pop[0].style.top=clientY+height+"px";
    pop[0].style.left=clientX-width/2+e.clientWidth/2+"px";
}
</script>
</html>
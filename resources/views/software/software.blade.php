<!DOCTYPE html>
<html>
<head>
    <title>Phần mềm karaoke</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/bootstrap-5.0.2/bootstrap-5.0.2/dist/css/bootstrap.min.css') }}">
    <script  src="{{asset('js/icoin.js')}}" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css?v=').time() }}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/media.css?v=').time() }}">
    
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script  src="{{asset('public/js/icoin.js')}}"></script>
   
</head>
<body style="overflow:hidden;">
  <nav>
      <div class="head-title">
          <div class="row" style="margin: 0px; padding: 5px;">
              <div class="col-lg-3"  style="padding: 0px;">
                  <div style="position: relative; width: 100%;">
                      <form >
                          <div class="form-group" style="display: flex;" >
                             <button class="btn btn-w1" >
                                <i class="fa fa-search"></i>
                              </button>
                              <input type="text"  class="form-control  bor-1" placeholder="Tìm thực đơn..." onkeyup="SeachProduct(this)">
                              <button class="btn btn-w1"   style="background-color: #e7ebee;">
                                  <i class="fas fa-keyboard" style="color: red;"></i>
                              </button>
                          </div>
                      </form>
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
              </div>
              <div class="col-lg-9">  
                 <div class="nav-bar">
                    <ul class="nav">
                         <li class="item-w1" style="display: none;">
                            <a class="btn btn-w2 mr-b1" data-bs-toggle="tooltip" data-bs-placement="bottom" title=""  onclick="minsize()">
                                  <i class="fas fa-desktop"></i>
                            </a>
                        </li>
                         <li class="item-w1">  
                             <a class="btn btn-w2 mr-b1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Quay về trang quản lý" onclick="fullsize()">
                                  <i class="fas fa-expand-arrows-alt"></i>
                             </a>
                         </li>
                         <li class="item-w1" style="display: none;"> 
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
                             <a class="btn btn-w2 mr-b1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" href="{{ url('dashboard') }}">
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
                      <div class="col-sm-12 deltail-bill pd-right-0 " id="order-software">
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
                              </tbody>
                          </table>
                      </div>
                      <div class="col-sm-12 pd-right-0" >
                          <div class="over-bill pd-3"style="height: 225px; width: inherit;margin-bottom: 5px;">
                              <div class="row">
                                  <div class="col-sm-6">
                                      
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group row mr-b1">
                                          <label class="col-lg-7 " style="font-size: 15px;">Tổng thành tiền</label>
                                          <div class="col-lg-5 text-right">
                                              <span  class="total-money" style="font-size: 1.125em;font-weight: 600;color: #8bc34a;">0</span>
                                          </div>
                                      </div>
                                      <div class="form-group row mr-b1">
                                          <label class="col-lg-7 " style="font-size: 15px;">Chiết Khấu
                                          </label>
                                          <div class="col-lg-5" style="display: flex;">
                                              <i class="fa fas fa-gift pd-3" style="color: #2a6496; line-height: 22px;cursor: pointer;" data-toggle="modal" data-target="#discount_order"></i>
                                              <input type="text" name="" class="form-control text-right" style="height: 28px;padding: 0px;" disabled value="0">
                                                <div class="modal fade" id="discount_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <input type="text" name="" class="form-control text-right" value="0" onblur="DiscounMoneyOrder()">
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
                                          </div>
                                      </div>
                                      <div class="form-group row mr-b1">
                                          <label class="col-lg-7 " style="font-size: 15px;">VAT-Phụ thu
                                              <button class="btn btn-primary" style="padding: 5px;">0</button>
                                              <button class="btn btn-primary" style="padding: 5px;">10%</button>
                                              <button class="btn btn-primary" style="padding: 5px;" data-toggle="modal" data-target="#VAT">?</button>
                                          </label>
                                          <div class="col-lg-5 text-right">
                                              <span class="pd-3 btn-primary" style="color: white;font-weight: 700; font-size: 20px; border-radius: 3px;">0</span>
                                              <div class="modal fade" id="VAT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align: left;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">VAT</h5>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border: 0px;">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label>VAT(%)</label>
                                                                <input type="text" name="" class="form-control text-right" value="0" onblur="VatMoneyOrder()">
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
                                          </div>
                                      </div>
                                      <div class="form-group row mr-b1">
                                          <label class="col-lg-7 " style="font-size: 15px;">Tổng cộng</label>
                                          <div class="col-lg-5 text-right">
                                              <span class="pd-3"style="background-color: red;color: white;font-weight: 700; font-size: 20px; border-radius: 3px;" id="total-money-after">0</span>
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
                                      <button class="btn-t1 btn pd-1" style="margin-bottom: 5px;" onclick="ShowExchangeTable(0)">
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
                                      <button class=" btn pd-1 btn-warning" style=" color: #fff " onclick="tamtinh()">
                                          <span class="fa fa-print"></span>
                                          <span>Tạm tính</span> 
                                      </button>
                                  </div>
                              </div>
                              <div style="height: 81px; width: calc( 30% - 5px); margin-left: 5px;">
                                  <button class="btn btn-t1" style="height: inherit; background-color: #dd191d;" onclick=" Save_Order()">
                                     <span>Thanh Toán<span>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-5" >
                <div class="row">
                    <div class="col-lg-6" style="padding: 5px 5px 5px 13px;">
                       <button class="btn btn-t1" onclick="ProductOrRoom_Software_FE(0)"style="height: 74px;"  >
                                        <span class="fa fa-crosshairs" ></span>
                                        <span >
                                          Phòng Ban [{{COUNT($data_order_room)}}/{{COUNT($data_room)}}]
                                       </span>
                                        <span  id="table_id_number" style="display: none;">0</span>
                                        <div id="table_number" style="white-space: nowrap; overflow: hidden; text-overflow: clip;"></div>

                         </button>
                    </div>
                     <div class="col-lg-6" style="padding: 5px 13px 5px 5px;">
                        <button class="btn  btn-t1" onclick="ProductOrRoom_Software_FE(1)" style="height: 74px;">
                                        <span class="fas fa-utensils" ></span>
                                        <span >THỰC ĐƠN</span>
                                        <div>Tất cả</div>
                        </button>
                     </div>
                </div>
                 
                  <div class="list-r-1" style="display: none;">
                      <div class="col-12">
                          <div class="row mr-0">
                              <div class=" col-lg-3 pd-3">
                                  <button class="btn btn-choose" style="width: 100%; background-color:#0B87C9; border: 0px; color: white" onclick="ListProductInCategory(0,this)" >Tất cả</button>
                              </div> 
                              @foreach($data_category as $value)
                              <div class=" col-lg-3 pd-3">
                                  <button class="btn btn btn-primary"  onclick="ListProductInCategory({{$value->id}},this)" style="width: 100%;border: 0px;">{{$value->name}}</button>
                              </div> 
                              @endforeach
                          </div>   
                       </div>
                       <div class="col-12">
                          <div id="product_software" style="display: flex; flex-wrap: wrap;">
                          @foreach($data_product as $value)
                          <div class="product-item" onclick="AddPRoductOrder({{$value->id}})">
                                 <img src="{{$value->image}}" >
                                 <span style="position: absolute;top:0;right: 0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;">{{$value->price->price_sell}}</span>
                                  <div style="position: absolute;bottom:0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;width: 100%;">{{$value->name}}</div>
                          </div>
                          @endforeach
                          </div>
                       </div>
                  </div>
                  <div class="list-r-1" >
                      <div class="col-12">
                          <div class="row mr-0">
                              <div class=" col-lg-3 pd-3">
                                  <button class="btn btn-choose" style="width: 100%; background-color:#0B87C9; border: 0px; color: white;" onclick="ListRoomInArea(0,this)" id="allListRoom">Tất cả</button>

                              </div>
                              @foreach($data_area as $value)
                                    <div class=" col-lg-3 pd-3" >
                                      <button class="btn " style="width: 100%;border: 0px; background-color:#0B87C9; color: white;" onclick="ListRoomInArea({{$value->id}},this)">{{$value->name}}</button>
                                    </div>
                              @endforeach
                          </div>   
                       </div>
                      <div class="col-12"  >
                            <div id="room_software"  style="display: flex; flex-wrap: wrap;">
                              @foreach($data_room as $value)
                              @if($value->active==0)
                              <div class="room-item" onclick="OrderInRoom({{$value->id}})">
                                       <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">{{$value->area->name}}.{{$value->name}}</div>
                                       <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;"></div>
                              </div> 
                              @endif
                              @if($value->active==1)
                                @foreach($data_order_room as $item)
                                 @if($item->id_room==$value->id)
                                <div class="room-item active-room" onclick="OrderInRoom({{$value->id}})">
                                          <div style="text-align: center; width:100%; color: white; font-size: 10px;"><?php echo date_format(new DateTime($item->created_at),"d/m H:i")?></div>
                                           <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">{{$value->area->name}}.{{$value->name}}</div>
                                </div>
                                @endif
                                @endforeach 
                              @endif
                              @endforeach
                           </div>
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
      </div>
      <div class="modal fade bd-example-modal-xl" id="move-room" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-xl" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Chuyển Bàn</h5>
                      <div id="table_exchange_id" class="d-none"></div>
                      <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border: 0px;">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                            @foreach($data_room as $value)
                              @if($value->active==0)
                              <div class="col-sm-1 col-2 pd-3">
                                <div class="room-item" style="width: 100%; margin-left: 0px;">
                                 <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">{{$value->area->name}}.{{$value->name}}</div>
                                 <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;"></div>
                                </div>
                              </div>
                              @endif
                              @if($value->active==1)
                                @foreach($data_order_room as $item)
                                 @if($item->id_room==$value->id)
                                <div class="col-sm-1 col-2 pd-3">
                                  <div class="room-item active-room" style="width:100%; margin-left: 0px; ">
                                            <div style="text-align: center; width:100%; color: white; font-size: 10px;"><?php echo date_format(new DateTime($item->created_at),"d/m H:i")?></div>
                                             <div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">{{$value->area->name}}.{{$value->name}}</div>
                                  </div>
                                </div>
                                @endif
                                @endforeach 
                              @endif
                              @endforeach
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary" onclick="MoveRoom()">Chuyển bàn</button>
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
  function ListRoomInArea(id,e){
      e.previousElementSibling;
      let x=e.parentElement.parentElement.getElementsByTagName('button');
      for (var i = 0; i < x.length; i++) {
        if(x[i]==e){
          x[i].classList.add('btn-choose');
        }
        else{
          x[i].classList.remove('btn-choose');
        }
      }
      $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              type:'get',
              url:'room/AreaFindRoom/'+id,
              success: function (data) {
                  let listroom=document.getElementById('room_software');
                  while (listroom.hasChildNodes()) {
                   listroom.removeChild(listroom.firstChild);
                  }
                  if(id>0)
                  {
                    for (var i =0; i <data.room.length; i++) {
                      if(data.room[i].active==0){
                        listroom.innerHTML+=' <div class="room-item"  onclick="OrderInRoom('+data.room[i].id+')"> <div style="position: absolute; top: 28px; width: 100%; color:white;overflow:hidden;font-size:15px;">'+data.name+'.'+data.room[i].name+'</div> <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;"></div>                              </div>  ';
                      }
                      else {
                                
                               listroom.innerHTML+='<div class="room-item active-room" onclick="OrderInRoom('+data.room[i].id+')"> <div style="text-align: center; width:100%; color: white; font-size: 10px;">'+data.room[i].order_active.created_at+'</div><div style=" width: 100%; color: white;overflow: hidden; font-size: 15px;">'+data.name+'.'+data.room[i].name+'</div></div>  ';

                      }
                    }
                  }
                  else if(id==0) {

                    for (var j = 0; j < data.length; j++) {
                        for (var i =0; i <data[j].room.length; i++) {
                          if(data[j].room[i].active==0){
                            listroom.innerHTML+=' <div class="room-item"  onclick="OrderInRoom('+data[j].room[i].id+')"> <div style="position: absolute; top: 28px; width: 100%; color:white;overflow:hidden;font-size:15px;">'+data[j].name+'.'+data[j].room[i].name+'</div> <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;"></div>                              </div>  ';
                          }
                          else {   
                                   let a=""
                                   if(data[j].room[i].order_active){
                                     a=data[j].room[i].order_active.created_at;
                                   }
                                   listroom.innerHTML+='<div class="room-item active-room" onclick="OrderInRoom('+data[j].room[i].id+')"> <div style="text-align: center; width:100%; color: white; font-size: 10px;">'+a+'</div><div style=" width: 100%; color: white;overflow: hidden; font-size: 15px;">'+data[j].name+'.'+data[j].room[i].name+'</div></div>  ';

                          }
                        }
                      }  
                  }        
              },
            });
  }
  function ProductOrRoom_Software_FE(e){
    let x =document.getElementsByClassName('list-r-1');
    if(e==1)
    {
      x[0].style.display="block";
      x[1].style.display="none";
    }
    else if(e==0){
      x[1].style.display="block";
      x[0].style.display="none";
      
    }
  }
  function ListProductInCategory(id,e){
     e.previousElementSibling;
     let x=e.parentElement.parentElement.getElementsByTagName('button');
      for (var i = 0; i < x.length; i++) {
        if(x[i]==e){
          x[i].classList.add('btn-choose');
        }
        else{
          x[i].classList.remove('btn-choose');
        }
      }
       $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              type:'get',
              url:'software/ListProductInCategory/'+id,
              success: function (data) {
                  let listproduct=document.getElementById('product_software');
    
                  while (listproduct.hasChildNodes()) {
                   listproduct.removeChild(listproduct.firstChild);
                  }
                  if(id>0)
                  {
                    for (var i =0; i <data.length; i++) {
                        listproduct.innerHTML+=' <div class="product-item" onclick="AddPRoductOrder('+data[i].pivot.id+')" ><img src="'+data[i].pivot.image+'" ><span style="position: absolute;top:0;right: 0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;">'+data[i].price_sell+'</span><div style="position: absolute;bottom:0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;width: 100%;">'+data[i].pivot.name+'</div></div>  ';
                    }
                  }
                  else if(id==0) {
                       
                    for (var i =0; i <data.length; i++) {
                        for (var j = 0; j < data[i].productandprice.length; j++) {
                         
                          listproduct.innerHTML+=' <div class="product-item" onclick="AddPRoductOrder('+data[i].productandprice[j].pivot.id+')" ><img src="'+data[i].productandprice[j].pivot.image+'" ><span style="position: absolute;top:0;right: 0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;">'+data[i].productandprice[j].price_sell+'</span><div style="position: absolute;bottom:0; color:#fff; font-size:13px;background-color: rgba(17,80,100,.7);padding: 3px;width: 100%;">'+data[i].productandprice[j].pivot.name+'</div></div>';
                        }

                    }
                  }        
              },
            });
  }
  function TimeRoom(id){
        
       return  $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              type:'get',
              url:'software/'+id,
              success: function (data) {
            
              //    time_order[0].innerHTML+= '<tr><td style="font-size: 16px;">Tiền Giờ</td><td class="dg-1 text-center hidden">Phút</td> <td width="110px;"><div style="display: flex; height: 30px;"><button class="btn btn-default pd-3"> <i class="fas fa-minus"></i></button><input type="" class="form-control text-center"  > <button class="btn btn-default pd-3"><i class="fas fa-plus" aria-hidden="true"></i> </button> </div></td><td style="display: flex;"><input type="" name="" class="form-control text-center" style="height: 30px;" value="'+Math.floor(data/60)+'" disabled><i class="fa fas fa-gift pd-3 d-none d-sm-block d-sm-none d-md-block" style="vertical-align: middle; line-height: 30px;cursor: pointer; color:#2a6496;" data-toggle="modal" data-target="#move-room"></i></td><td class="text-center">0</td><td ></td></tr>';
              },
            });
  }
  function FindRoomSofware_FE(id){
   $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              type:'get',
              url:'room/show/'+id,
              success: function (data) {
                    let table_number=document.getElementById('table_number');
                    let id_table_number=document.getElementById('table_id_number');
                    table_number.textContent=data.area.name+'.'+data.name;
                    id_table_number.textContent=data.id;

              },
            });
  }
  function ProductOrderInRoom(id){   
      return $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              type:'get',
              url:'software/OrderInRoom/'+id,
              success: function (data) {
               // for (var i = 0; i < data.detail_order.length; i++) {
               //    let name_unit="";
               //    if( data.detail_order[i].unit!=null){
               //      name_unit=data.detail_order[i].unit.name;
               //    }
               //    time_order[0].innerHTML+= '<tr><td style="font-size: 16px;">'+data.detail_order[i].product.name+'</td><td class="dg-1 text-center hidden">'+name_unit+'</td> <td width="110px;"><div style="display: flex; height: 30px;"><button class="btn btn-default pd-3"> <i class="fas fa-minus"></i></button><input type="" class="form-control text-center" value="'+data.detail_order[i].number+'" > <button class="btn btn-default pd-3"><i class="fas fa-plus" aria-hidden="true"></i> </button> </div></td><td style="display: flex;"><input type="" name="" class="form-control text-center" style="height: 30px;" value="'+data.detail_order[i].price.price_sell+'" disabled><i class="fa fas fa-gift pd-3 d-none d-sm-block d-sm-none d-md-block" style="vertical-align: middle; line-height: 30px;cursor: pointer; color:#2a6496;" data-toggle="modal" data-target="#move-room"></i></td><td class="text-center">'+(data.detail_order[i].number*data.detail_order[i].price.price_sell-data.detail_order[i].number*data.detail_order[i].price.price_sell*data.detail_order[i].discount_product/100)+'</td><td ><span class="far fa-trash-alt" style="font-size: 13px; vertical-align: middle; color: blue;cursor: pointer;" aria-hidden="true"></span></td></tr>';
               // }
              },
            });
  }
  async function OrderInRoom(id){
    let x=document.getElementById('order-software');
    let time_order=x.getElementsByTagName('tbody');
    FindRoomSofware_FE(id);
    while (time_order[0].hasChildNodes()) {
     time_order[0].removeChild(time_order[0].firstChild);
    }
    const data =await ProductOrderInRoom(id);

    
    const data1=await TimeRoom(id);
    if(data){
         let active_discount_time1="";
        for (var i = 0; i < data.detail_order.length; i++) {
                  let name_unit="";
                  if( data.detail_order[i].unit!=null){
                    name_unit=data.detail_order[i].unit.name;
                  }
                  let active_discount="";
                  if( data.detail_order[i].discount_product>0){
                    active_discount="active";
                  }
                  time_order[0].innerHTML+= '<tr data-id="'+data.detail_order[i].id_product+'"><td style="font-size: 16px;">'+data.detail_order[i].product.name+'</td><td class="dg-1 text-center hidden">'+name_unit+'</td> <td width="110px;"><div style="display: flex; height: 30px;"><button class="btn btn-default pd-3" onclick="MinusProductOrder('+data.detail_order[i].id_product+')"> <i class="fas fa-minus"></i></button><input type="text"  class="form-control text-center" value="'+data.detail_order[i].number+'" onkeyup="onkey1('+data.detail_order[i].id_product+')" > <button class="btn btn-default pd-3" onclick=" PlusProductOrder('+data.detail_order[i].id_product+')"><i class="fas fa-plus" aria-hidden="true"></i> </button> </div></td><td style="display: flex;"><input type="" name="" class="form-control text-center" style="height: 30px;" value="'+data.detail_order[i].price.price_sell+'" disabled> <div class="modal fade" id="cms_product_'+data.detail_order[i].id_product+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Chiết khấu</h5><button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border: 0px;"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><label>Chiết Khấu(%)</label><input type="text" name="" class="form-control text-right" value="'+data.detail_order[i].discount_product+'" onblur="DiscountProductOrder('+data.detail_order[i].id_product+')"><div style="display: flex; margin-top: 10px;"><span class="btn btn-primary" style="border-radius: 0px;">5%</span><span class="btn btn-primary" style="border-radius: 0px;">10%</span><span class="btn btn-primary" style="border-radius: 0px;">15%</span><span class="btn btn-primary" style="border-radius: 0px;">20%</span><span class="btn btn-primary" style="border-radius: 0px;">25%</span><span class="btn btn-primary" style="border-radius: 0px;">30%</span><span class="btn btn-primary" style="border-radius: 0px;">50%</span><span class="btn btn-primary" style="border-radius: 0px;">100%</span></div>                  </div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button></div></div></div></div><i class="fa fas fa-gift pd-3 d-none d-sm-block d-sm-none d-md-block '+ active_discount+'" style="vertical-align: middle; line-height: 30px;cursor: pointer; color:#2a6496;" data-toggle="modal" data-target="#cms_product_'+data.detail_order[i].id_product+'"></i></td><td class="text-center money_total">'+(data.detail_order[i].number*data.detail_order[i].price.price_sell-data.detail_order[i].number*data.detail_order[i].price.price_sell*data.detail_order[i].discount_product/100)+'</td><td ><span class="far fa-trash-alt" style="font-size: 13px; vertical-align: middle; color: blue;cursor: pointer;" aria-hidden="true" onclick="DeleteProductInOrder('+data.detail_order[i].id_product+')"></span></td></tr>';
        }           

                    document.getElementById('VAT').getElementsByTagName('input')[0].value=data.VAT;
                    if(data.discount_time>0){
                         active_discount_time1="active";
                    }
                    time_order[0].innerHTML+= '<tr  data-id="0"><td style="font-size: 16px;">Tiền Giờ</td><td class="dg-1 text-center hidden">Phút</td> <td width="110px;"><div style="display: flex; height: 30px;"><button class="btn btn-default pd-3"> <i class="fas fa-minus"></i></button><input type="" class="form-control text-center" value="0" > <button class="btn btn-default pd-3"><i class="fas fa-plus" aria-hidden="true"></i> </button> </div></td><td style="display: flex;"><input type="text" name="" class="form-control text-center" style="height: 30px;" value="'+Math.floor(data1/60)+'" disabled><div class="modal fade" id="cms_product_0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Chiết khấu</h5><button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border: 0px;"><span aria-hidden="true">×</span></button></div><div class="modal-body"><label>Chiết Khấu(%)</label><input type="text" name="" class="form-control text-right" value="'+data.discount_time+'" onblur="DiscountMoneyTime()" ><div style="display: flex; margin-top: 10px;"><span class="btn btn-primary" style="border-radius: 0px;">5%</span><span class="btn btn-primary" style="border-radius: 0px;">10%</span><span class="btn btn-primary" style="border-radius: 0px;">15%</span><span class="btn btn-primary" style="border-radius: 0px;">20%</span><span class="btn btn-primary" style="border-radius: 0px;">25%</span><span class="btn btn-primary" style="border-radius: 0px;">30%</span><span class="btn btn-primary" style="border-radius: 0px;">50%</span><span class="btn btn-primary" style="border-radius: 0px;">100%</span></div>                  </div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button></div></div></div></div><i class="fa fas fa-gift pd-3 d-none d-sm-block d-sm-none d-md-block '+ active_discount_time1 +'" style="vertical-align: middle; line-height: 30px;cursor: pointer; color:#2a6496;" data-toggle="modal" data-target="#cms_product_0"></i></td><td class="text-center">0</td><td ></td></tr>';
                      if(data.discount_order>0){
                     document.getElementById('discount_order').parentElement.firstElementChild.classList.add('active');
                      document.getElementById('discount_order').getElementsByTagName('input')[0].value=data.discount_order;
                       
                    }
                    else {
                      document.getElementById('discount_order').parentElement.firstElementChild.classList.remove('active');
                    document.getElementById('discount_order').getElementsByTagName('input')[0].value=0;
                    }
                  TotalMoneyInOrder();

    }
    else {
       time_order[0].innerHTML+= '<tr data-id="0"><td style="font-size: 16px;">Tiền Giờ</td><td class="dg-1 text-center hidden">Phút</td> <td width="110px;"><div style="display: flex; height: 30px;"><button class="btn btn-default pd-3"> <i class="fas fa-minus"></i></button><input type="" class="form-control text-center" value="0"> <button class="btn btn-default pd-3"><i class="fas fa-plus" aria-hidden="true"></i> </button> </div></td><td style="display: flex;"><input type="" name="" class="form-control text-center" style="height: 30px;" value="'+Math.floor(data1/60)+'" disabled><div class="modal fade" id="cms_product_0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Chiết khấu</h5><button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border: 0px;"><span aria-hidden="true">×</span></button></div><div class="modal-body"><label>Chiết Khấu(%)</label><input type="text" name="" class="form-control text-right" value="0" onblur="DiscountMoneyTime()"><div style="display: flex; margin-top: 10px;"><span class="btn btn-primary" style="border-radius: 0px;">5%</span><span class="btn btn-primary" style="border-radius: 0px;">10%</span><span class="btn btn-primary" style="border-radius: 0px;">15%</span><span class="btn btn-primary" style="border-radius: 0px;">20%</span><span class="btn btn-primary" style="border-radius: 0px;">25%</span><span class="btn btn-primary" style="border-radius: 0px;">30%</span><span class="btn btn-primary" style="border-radius: 0px;">50%</span><span class="btn btn-primary" style="border-radius: 0px;">100%</span></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button></div></div></div></div><i class="fa fas fa-gift pd-3 d-none d-sm-block d-sm-none d-md-block" style="vertical-align: middle; line-height: 30px;cursor: pointer; color:#2a6496;" data-toggle="modal" data-target="#cms_product_0"></i></td><td class="text-center">0</td><td ></td></tr>';
       document.getElementsByClassName('total-money')[0].textContent=0;
       document.getElementById('discount_order').parentElement.getElementsByTagName('input')[0].value=0;
      document.getElementById('VAT').parentElement.getElementsByTagName('span')[0].textContent=0;
      document.getElementById('total-money-after').textContent=0;
      document.getElementById('VAT').getElementsByTagName('input')[0].value=0;
       document.getElementById('discount_order').parentElement.firstElementChild.classList.remove('active');
    }
    const att = document.createAttribute("onclick");
    att.value="ShowExchangeTable("+id+")";
  document.getElementsByClassName('deltail-bill-1')[0].getElementsByClassName('flex-1')[0].getElementsByTagName('button')[0].setAttributeNode(att);

  }
  function AddPRoductOrder(id)
  {
     let id_table_number=document.getElementById('table_id_number');
    
     $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      type:'POST',
      url:'software/AddOrderProduct/'+id,
      data:{
          'idRoom':id_table_number.textContent,
        },
         success: function (data) {
              $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              type:'get',
              url:'room/show/'+id_table_number.textContent,
              success: function (data) {
                   let idroom=+data.area.id;
                   let element=document.getElementById('allListRoom');
                   if(element.classList.contains('btn-choose'))
                   {
                    idroom=0;
                   }
                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                          type:'get',
                          url:'room/AreaFindRoom/'+idroom,
                          success: function (data) {
                              let listroom=document.getElementById('room_software');
                              while (listroom.hasChildNodes()) {
                               listroom.removeChild(listroom.firstChild);
                              }
                              if(idroom>0)
                              {
                                for (var i =0; i <data.room.length; i++) {
                                  if(data.room[i].active==0){
                                    listroom.innerHTML+=' <div class="room-item"  onclick="OrderInRoom('+data.room[i].id+')"> <div style="position: absolute; top: 28px; width: 100%; color:white;overflow:hidden;font-size:15px;">'+data.name+'.'+data.room[i].name+'</div> <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;"></div>                              </div>  ';
                                  }
                                  else {
                                         
                                           listroom.innerHTML+='<div class="room-item active-room" onclick="OrderInRoom('+data.room[i].id+')"> <div style="text-align: center; width:100%; color: white; font-size: 10px;">'+data.room[i].order_active.created_at+'</div><div style=" width: 100%; color: white;overflow: hidden; font-size: 15px;">'+data.name+'.'+data.room[i].name+'</div></div>  ';

                                  }
                                }
                              }
                              else if(idroom==0) {

                                for (var j = 0; j < data.length; j++) {
                                    for (var i =0; i <data[j].room.length; i++) {
                                      if(data[j].room[i].active==0){
                                        listroom.innerHTML+=' <div class="room-item"  onclick="OrderInRoom('+data[j].room[i].id+')"> <div style="position: absolute; top: 28px; width: 100%; color:white;overflow:hidden;font-size:15px;">'+data[j].name+'.'+data[j].room[i].name+'</div> <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;"></div>                              </div>  ';
                                      }
                                      else {
                                               let a=""
                                               if(data[j].room[i].order_active){
                                                 a=data[j].room[i].order_active.created_at;
                                               }
                                               listroom.innerHTML+='<div class="room-item active-room" onclick="OrderInRoom('+data[j].room[i].id+')"> <div style="text-align: center; width:100%; color: white; font-size: 10px;">'+a+'</div><div style=" width: 100%; color: white;overflow: hidden; font-size: 15px;">'+data[j].name+'.'+data[j].room[i].name+'</div></div>  ';

                                      }
                                    }
                                  }  
                              }        
                          },
                        });

              },
            });
      },
      error: function(data) { 
          
        }
      });
    let x=document.getElementById('order-software');
    let time_order=x.getElementsByTagName('tbody');
    let row_order=time_order[0].getElementsByTagName('tr');
    $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'get',
              url:'products/'+id,
              success: function (data) {
                 let check=false;
               for (var i = 0; i < row_order.length; i++) {
                 let id_product=row_order[i].getAttribute("data-id");
                 if(id_product==data.id){
                  check=true;
                  let number_product=Number(row_order[i].getElementsByTagName('input')[0].value)+1;
                  row_order[i].getElementsByTagName('input')[0].value=number_product;
                   let money_total= row_order[i].getElementsByClassName('money_total');
                   money_total[0].textContent=number_product*data.price.price_sell;
                    break;
                 }
               }

               if(check==false){
                let t=document.createElement('tr');
                const att = document.createAttribute("data-id");
                att.value=data.id;
                t.setAttributeNode(att);
                t.innerHTML='<td style="font-size: 16px;">'+data.name+'</td><td class="dg-1 text-center hidden">'+data.unit.name+'</td> <td width="110px;"><div style="display: flex; height: 30px;"><button class="btn btn-default pd-3" onclick="MinusProductOrder('+data.id+')"> <i class="fas fa-minus"></i></button><input type="text" class="form-control text-center"  value="1"> <button class="btn btn-default pd-3" onclick="PlusProductOrder('+data.id+')"><i class="fas fa-plus" aria-hidden="true"></i> </button> </div></td><td style="display: flex;"><input type="" name="" class="form-control text-center" style="height: 30px;" value="'+data.price.price_sell+'" disabled><div class="modal fade" id="cms_product_'+data.id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Chiết khấu</h5><button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close" style="border: 0px;"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><label>Chiết Khấu(%)</label><input type="" name="" class="form-control text-right" value="0" onblur="DiscountProductOrder('+data.id+')"><div style="display: flex; margin-top: 10px;"><span class="btn btn-primary" style="border-radius: 0px;">5%</span><span class="btn btn-primary" style="border-radius: 0px;">10%</span><span class="btn btn-primary" style="border-radius: 0px;">15%</span><span class="btn btn-primary" style="border-radius: 0px;">20%</span><span class="btn btn-primary" style="border-radius: 0px;">25%</span><span class="btn btn-primary" style="border-radius: 0px;">30%</span><span class="btn btn-primary" style="border-radius: 0px;">50%</span><span class="btn btn-primary" style="border-radius: 0px;">100%</span></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button></div></div></div></div><i class="fa fas fa-gift pd-3 d-none d-sm-block d-sm-none d-md-block" style="vertical-align: middle; line-height: 30px;cursor: pointer; color:#2a6496;" data-toggle="modal" data-target="#cms_product_'+data.id+'"></i></td><td class="text-center money_total">'+data.price.price_sell+'</td><td ><span class="far fa-trash-alt" style="font-size: 13px; vertical-align: middle; color: blue;cursor: pointer;" aria-hidden="true" onclick="DeleteProductInOrder('+data.id+')"></span></td>';
                // let element='<tr data-id="'+data.id+'"><td style="font-size: 16px;">'+data.name+'</td><td class="dg-1 text-center hidden">'+data.unit.name+'</td> <td width="110px;"><div style="display: flex; height: 30px;"><button class="btn btn-default pd-3"> <i class="fas fa-minus"></i></button><input type="text" class="form-control text-center"  value="1"> <button class="btn btn-default pd-3"><i class="fas fa-plus" aria-hidden="true"></i> </button> </div></td><td style="display: flex;"><input type="" name="" class="form-control text-center" style="height: 30px;" value="'+data.price.price_sell+'" disabled><i class="fa fas fa-gift pd-3 d-none d-sm-block d-sm-none d-md-block" style="vertical-align: middle; line-height: 30px;cursor: pointer; color:#2a6496;" data-toggle="modal" data-target="#move-room"></i></td><td class="text-center money_total">'+data.price.price_sell+'</td><td ><span class="far fa-trash-alt" style="font-size: 13px; vertical-align: middle; color: blue;cursor: pointer;" aria-hidden="true"></span></td></tr>';
                 time_order[0].appendChild(t);
                  
               }
               TotalMoneyInOrder();
              },
            });
   document.getElementsByClassName('seach-b1')[0].style.display="none";
   
  }
  function PlusProductOrder(product_id){
    let id_room=document.getElementById('table_id_number').textContent;
    let x=document.getElementById('order-software');
    let time_order=x.getElementsByTagName('tbody');
    let row_order=time_order[0].getElementsByTagName('tr');
    let number_product;
    for (var i = 0; i < row_order.length; i++) {
                 let id_product=row_order[i].getAttribute("data-id");
                 if(id_product==product_id){
                   number_product=Number(row_order[i].getElementsByTagName('input')[0].value)+1;
                  row_order[i].getElementsByTagName('input')[0].value=number_product;
                  row_order[i].getElementsByClassName('money_total')[0].textContent=number_product*row_order[i].getElementsByTagName('input')[1].value-number_product*row_order[i].getElementsByTagName('input')[1].value*row_order[i].getElementsByTagName('input')[2].value/100;
                  break;
                 }
        }
         $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'software/MinusOrPlusProductInOrder',
              data:{
                'id_room':id_room,
                'id_product':product_id,
                'number':number_product,
              },
              success: function (data) {
                
              },
            });
        TotalMoneyInOrder();

  }
  function onkey1(product_id){
   let id_room=document.getElementById('table_id_number').textContent;
    let x=document.getElementById('order-software');
    let time_order=x.getElementsByTagName('tbody');
    let row_order=time_order[0].getElementsByTagName('tr');
    let number_product;
    for (var i = 0; i < row_order.length; i++) {
                 let id_product=row_order[i].getAttribute("data-id");
                 if(id_product==product_id){
                    number_product=Number(row_order[i].getElementsByTagName('input')[0].value);
                    if(number_product==0){
                      number_product=1;
                    }
                    if(number_product==''){
                      number_product=1;
                    }
                    row_order[i].getElementsByTagName('input')[0].value=number_product;
                     row_order[i].getElementsByClassName('money_total')[0].textContent=number_product*row_order[i].getElementsByTagName('input')[1].value-number_product*row_order[i].getElementsByTagName('input')[1].value*row_order[i].getElementsByTagName('input')[2].value/100;
                    break;
                 }
        }
         $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'software/MinusOrPlusProductInOrder',
              data:{
                'id_room':id_room,
                'id_product':product_id,
                'number':number_product,
              },
              success: function (data) {
                
              },
            });
         TotalMoneyInOrder();
  }
  function MinusProductOrder(product_id){
    let id_room=document.getElementById('table_id_number').textContent;
    let x=document.getElementById('order-software');
    let time_order=x.getElementsByTagName('tbody');
    let row_order=time_order[0].getElementsByTagName('tr');
    let number_product;

    for (var i = 0; i < row_order.length; i++) {
                 let id_product=row_order[i].getAttribute("data-id");
                 if(id_product==product_id){
                    number_product=Number(row_order[i].getElementsByTagName('input')[0].value)-1;
                    if(number_product==0){
                      number_product=1;
                    }
                    row_order[i].getElementsByTagName('input')[0].value=number_product;
                     row_order[i].getElementsByClassName('money_total')[0].textContent=number_product*row_order[i].getElementsByTagName('input')[1].value-number_product*row_order[i].getElementsByTagName('input')[1].value*row_order[i].getElementsByTagName('input')[2].value/100;
                    break;
                 }
        }
         $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'software/MinusOrPlusProductInOrder',
              data:{
                'id_room':id_room,
                'id_product':product_id,
                'number':number_product,
              },
              success: function (data) {
                
              },
            });
         TotalMoneyInOrder();
   }
  function DiscountProductOrder(product_id){
    let id_room=document.getElementById('table_id_number').textContent;
    let x=document.getElementById('order-software');
    let time_order=x.getElementsByTagName('tbody');
    let row_order=time_order[0].getElementsByTagName('tr');
    let discount;
     for (var i = 0; i < row_order.length; i++) {
                 let id_product=row_order[i].getAttribute("data-id");
                 if(product_id==id_product){
                   discount=row_order[i].getElementsByTagName('input')[2].value;
                     row_order[i].getElementsByClassName('money_total')[0].textContent= row_order[i].getElementsByTagName('input')[0].value*row_order[i].getElementsByTagName('input')[1].value-row_order[i].getElementsByTagName('input')[2].value/100* row_order[i].getElementsByTagName('input')[0].value*row_order[i].getElementsByTagName('input')[1].value;
                    if(discount>0){
                      row_order[i].getElementsByTagName('i')[2].classList.add("active");
                    }
                    else {
                         row_order[i].getElementsByTagName('i')[2].classList.remove("active");
                    }
                   break;
                 }
      }
     
      $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'software/DiscountProductInOrder',
              data:{
                'id_room':id_room,
                'id_product':product_id,
                'discount':discount,
              },
              success: function (data) {
                
              },
            });
      TotalMoneyInOrder();
  }
  function DeleteProductInOrder(product_id){
    let x=document.getElementById('order-software');
    let time_order=x.getElementsByTagName('tbody');
    let row_order=time_order[0].getElementsByTagName('tr');
    let id_room=document.getElementById('table_id_number').textContent;
     for (var i = 0; i < row_order.length; i++) {
       let id_product=row_order[i].getAttribute("data-id");
                 if(product_id==id_product){
                     row_order[i].remove();
                 }
     }
       $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'delete',
              url:'software/DeleteProductInOrder',
              data:{
                'id_room':id_room,
                'id_product':product_id,
              },
              success: function (data) {
                
              },
            });
        TotalMoneyInOrder();
  }
 function TotalMoneyInOrder(){
    let x=document.getElementById('order-software');
    let time_order=x.getElementsByTagName('tbody');
    let row_order=time_order[0].getElementsByTagName('tr');
    let VAT=document.getElementById('VAT').getElementsByTagName('input')[0].value;
    let total=0;
    for (var i = 0; i < row_order.length; i++) {
     if(row_order[i].getElementsByClassName('money_total')[0]){
         total+=parseInt(row_order[i].getElementsByClassName('money_total')[0].textContent);
      }
    }
    const total_money_time=TotalMoneyTimeInOrder();
    total+=Number(total_money_time);
    document.getElementsByClassName('total-money')[0].textContent=numberWithCommas(total);
    document.getElementById('discount_order').parentElement.getElementsByTagName('input')[0].value=numberWithCommas(parseInt(document.getElementById('discount_order').getElementsByTagName('input')[0].value*total/100));
      document.getElementById('VAT').parentElement.getElementsByTagName('span')[0].textContent=numberWithCommas(parseInt(total*VAT/100));
       document.getElementById('total-money-after').textContent=numberWithCommas(total-parseInt(document.getElementById('discount_order').getElementsByTagName('input')[0].value*total/100)+parseInt(total*VAT/100));
    setTimeout(TotalMoneyInOrder, 60000);
 }
 function TotalMoneyTimeInOrder(){
    let id_room=document.getElementById('table_id_number').textContent;
    var total=0;
     $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'software/TimeMoney',  
              data:{
                'id_room':id_room,
              },
              async: false,
              success: function (data) {
               total=data;
               
              },
              error:function(data){
                console.log(data);
              }
            });                    
      return  total;
  
 }
 function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
 }
 function DiscountMoneyTime(){
    let x=document.getElementById('order-software');
    let time_order=x.getElementsByTagName('tbody');
    let row_order=time_order[0].getElementsByTagName('tr');
    let id_room=document.getElementById('table_id_number').textContent;
    let discount;
    for (var i = 0; i < row_order.length; i++) {
                 let id_product=row_order[i].getAttribute("data-id");
                 if(id_product==0){
                   discount=row_order[i].getElementsByTagName('input')[2].value;
                   if(discount>0){
                      row_order[i].getElementsByTagName('i')[2].classList.add("active");
                    }
                    else {
                         row_order[i].getElementsByTagName('i')[2].classList.remove("active");
                    }
                   break;
                 }
    }

     $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'software/DiscountMoneyTimeInOrder',  
              data:{
                'idRoom':id_room,
                'discount_time':discount,
              },
              success: function (data) {
                TotalMoneyInOrder();
               
              },
              error:function(data){
                console.log(data);
              }
            });
     $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              type:'get',
              url:'room/show/'+id_room,
              success: function (data) {
                   let idroom=+data.area.id;
                   let element=document.getElementById('allListRoom');
                   if(element.classList.contains('btn-choose'))
                   {
                    idroom=0;
                   }
                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                          type:'get',
                          url:'room/AreaFindRoom/'+idroom,
                          success: function (data) {
                              let listroom=document.getElementById('room_software');
                              while (listroom.hasChildNodes()) {
                               listroom.removeChild(listroom.firstChild);
                              }
                              if(idroom>0)
                              {
                                for (var i =0; i <data.room.length; i++) {
                                  if(data.room[i].active==0){
                                    listroom.innerHTML+=' <div class="room-item"  onclick="OrderInRoom('+data.room[i].id+')"> <div style="position: absolute; top: 28px; width: 100%; color:white;overflow:hidden;font-size:15px;">'+data.name+'.'+data.room[i].name+'</div> <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;"></div>                              </div>  ';
                                  }
                                  else {
                                          
                                           listroom.innerHTML+='<div class="room-item active-room" onclick="OrderInRoom('+data.room[i].id+')"> <div style="text-align: center; width:100%; color: white; font-size: 10px;">'+data.room[i].order_active.created_at+'</div><div style=" width: 100%; color: white;overflow: hidden; font-size: 15px;">'+data.name+'.'+data.room[i].name+'</div></div>  ';

                                  }
                                }
                              }
                              else if(idroom==0) {
                               
                                for (var j = 0; j < data.length; j++) {
                                    for (var i =0; i <data[j].room.length; i++) {
                                      if(data[j].room[i].active==0){
                                        listroom.innerHTML+=' <div class="room-item"  onclick="OrderInRoom('+data[j].room[i].id+')"> <div style="position: absolute; top: 28px; width: 100%; color:white;overflow:hidden;font-size:15px;">'+data[j].name+'.'+data[j].room[i].name+'</div> <div style="position: absolute;bottom: 0px;text-align: center; width:100%; color: white; font-size: 13px;"></div>                              </div>  ';
                                      }
                                      else {
                                               let a=""
                                               if(data[j].room[i].order_active){
                                                 a=data[j].room[i].order_active.created_at;
                                               }
                                               listroom.innerHTML+='<div class="room-item active-room" onclick="OrderInRoom('+data[j].room[i].id+')"> <div style="text-align: center; width:100%; color: white; font-size: 10px;">'+a+'</div><div style=" width: 100%; color: white;overflow: hidden; font-size: 15px;">'+data[j].name+'.'+data[j].room[i].name+'</div></div>  ';

                                      }
                                    }
                                  }  
                              }        
                          },
                        });
                      },
                  });
 }
 function DiscounMoneyOrder(){
    let id_room=document.getElementById('table_id_number').textContent;
    let discount_order=document.getElementById('discount_order').getElementsByTagName('input')[0].value;
    $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'software/DiscountOrderInRoom',  
              data:{
                'id_room':id_room,
                'discount_order':discount_order,
              },
              success: function (data) {
               
              },
              error:function(data){
                console.log(data);
              }
            });
    if(discount_order>0){
     document.getElementById('discount_order').parentElement.firstElementChild.classList.add('active');
    }
    else {
      document.getElementById('discount_order').parentElement.firstElementChild.classList.remove('active');
    }
    
 }
 function VatMoneyOrder(){
    let id_room=document.getElementById('table_id_number').textContent;
    let VAT=document.getElementById('VAT').getElementsByTagName('input')[0].value;
    $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'software/VAT',  
              data:{
                'id_room':id_room,
                'VAT':VAT,
              },
              success: function (data) {
               
              },
              error:function(data){
                console.log(data);
              }
            });
    
    document.getElementById('VAT').parentElement.getElementsByTagName('span')[0].textContent=numberWithCommas(parseInt(document.getElementsByClassName('total-money')[0].textContent.replace(/,/g, "")*VAT/100));
 }
 function SeachProduct(e) {
    let search_product=e.value.trim();
    $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'software/searchproducts',  
              data:{
                'search_product':search_product,
                
              },
              success: function (data) {
                document.getElementsByClassName('seach-b1')[0].innerHTML="";
                if(search_product){
                  document.getElementsByClassName('seach-b1')[0].style.display="block";
                   for (var i = 0; i<data.length; i++) {
                     document.getElementsByClassName('seach-b1')[0].innerHTML+='<div class="seach-item" onclick="AddPRoductOrder('+data[i].id+')"><div>'+data[i].name+'</div><div><span style="font-size: 13px;">'+data[i].Ma_sp+'</span><span class="seach-c1" style="margin-left:5px;">'+data[i].number+'</span><span class="seach-c1" style="margin-left:5px;">'+data[i].price.price_sell+'</span></div></div>';
                    }
                }
                else {
                  document.getElementsByClassName('seach-b1')[0].style.display="none";
                }
              },
              error:function(data){
                console.log(data);
              }
            });
 }
 function select_exchange(id){
   let x=document.getElementById("move-room");
   let data= x.querySelectorAll('[data-id]');
   for( var i=0;i<data.length;i++){
       if(data[i].getAttribute("data-id")==id){
        data[i].classList.add("select");
       }
      else {
        data[i].classList.remove("select");
      }
   }
   document.getElementById('table_exchange_id').textContent=id;
 }
 function ShowExchangeTable(id_room){
   let x=document.getElementById("move-room").getElementsByClassName("row")[0];
   let y=document.getElementById("move-room");
    x.innerHTML="";
  $(document).ready(function(){
    $('#move-room').modal('show');
  });
  $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'get',
              url:'room/AreaFindRoom/0',
              success: function (data) {
                 for (var j = 0; j < data.length; j++) {
                    for (var i =0; i <data[j].room.length; i++) {
                      if(data[j].room[i].id!=id_room){
                         if(data[j].room[i].active==0){
                        x.innerHTML+='<div class="col-sm-1 col-2 pd-3"><div class="room-item" onclick ="select_exchange('+data[j].room[i].id+')" data-id="'+data[j].room[i].id+'" style="width:100%; margin-left: 0px; "><div style="text-align: center; width:100%; color: white; font-size: 10px;"></div><div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">'+data[j].name+'.'+data[j].room[i].name+'</div></div></div>';
                      }
                      else {
                            let a="";
                                   if(data[j].room[i].order_active){
                                     a=data[j].room[i].order_active.created_at;
                                   }
                           x.innerHTML+='<div class="col-sm-1 col-2 pd-3"><div class="room-item active-room" style="width:100%; margin-left: 0px; "  onclick ="select_exchange('+data[j].room[i].id+')" data-id="'+data[j].room[i].id+'"><div style="text-align: center; width:100%; color: white; font-size: 10px;">'+a+'</div><div style="position: absolute; top: 28px; width: 100%; color: white;overflow: hidden; font-size: 15px;">'+data[j].name+'.'+data[j].room[i].name+'</div></div></div>';
                      }
                  }
                 }
               }
              },
            });

 }
 function MoveRoom(){
   let id_room=document.getElementById('table_id_number').textContent;
   if(id_room==0){
     $(document).ready(function(){
      $('#move-room').modal('hide');
       });
       document.getElementById('table_exchange_id').textContent="";
       alert("Bạn chưa chọn phòng để chuyển. Vui lòng chọn phòng");
      }
   else {
     let to=document.getElementById('table_exchange_id').textContent;
     if(!to){
       alert("Bạn vui lòng chọn phòng đến");
     }
     else {
          
           $.ajax({
              headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'post',
              url:'software/MoveRoom',
              data:{
                'id_room':id_room,
                'id_room_to':to,
              },
              success: function (data) {
                  console.log(data);
                    location.reload();
              },
              error: function(data){
                console.log(data);
              }
            });
     }
   }
 }
 function Save_Order(){
  let idRoom=document.getElementById("table_id_number").textContent;
    $.ajax({
        type: 'GET',
        url: 'software/Order/Payment/'+idRoom,
        dataType: 'html',
        success: function (html) {
            w = window.open("","blank","height=800,width=800,modal=yes,alwaysRaised=yes");
            w.document.write(html);
            w.document.close();
            w.window.print();
            w.window.close();
            location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
 }
 function tamtinh(){
  let idRoom=document.getElementById("table_id_number").textContent;
    $.ajax({
        type: 'GET',
        url: 'software/Order/tamtinh/'+idRoom,
        dataType: 'html',
        success: function (html) {
            w = window.open("","blank","height=800,width=800,modal=yes,alwaysRaised=yes");
            w.document.write(html);
            w.document.close();
            w.window.print();
            w.window.close();
            location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
 }
 function fullsize(){
  document.getElementsByTagName('body')[0].requestFullscreen();
  document.getElementsByClassName('content')[0].style.backgroundColor="white";
 }
 
</script>
</html>
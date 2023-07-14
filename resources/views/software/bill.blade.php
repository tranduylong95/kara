<html>
<head>
  <style>
    * {font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;}
    
    .thanhtoan td {
      border: dotted 1px #000000;
      
    }
    .thanhtoan{
      background-image: radial-gradient(circle at 50% 50%, #999 1px, transparent 1px);
  background-repeat: round;
  border-spacing: 0
    }
    </style>
</head>
<body>
<div>
<div>
<table style="width:100%; border-spacing: 10px 30px; ">
  <tbody>
    <tr>
      <td style="text-align:center">
      <table style="width:100%">
        <tbody>
          <tr>
            <td style="text-align:center"><strong style="font-size: 13px;">KARAOKE {{$data_company_child->name}}</strong></td>
          </tr>
          <tr></tr>
          <tr>
            <td style="text-align:left;font-size: 13px;"><i>Địa chỉ:{{$data_company_child->adress}}</i></td>
          </tr>
          <tr style="display: block; margin-top: 8px;">
            <td style="text-align:left;font-size: 13px;"><i>HOTLINE: {{$data_company_child->phone}}</i></td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
  </tbody>
</table>

<div style="text-align:center ;margin-top:10px;margin-bottom:10px;" ><span style="font-size:20px"><strong>PHIẾU THANH TOÁN</strong></span></div>

<table style="width:100%">
  <tbody>
    <tr>
      <td style="text-align:center;"><strong style="font-size: 12px;">&nbsp;{{$data_order->code_order}}</strong></td>
    </tr>
    <tr>
      <td style="font-size: 11px;"><strong>Ngày tạo:</strong>&nbsp;<?php echo date_format(new DateTime($data_order->created_at),"d/m H:i")?></td>
    </tr>
    <tr>
      <td style="font-size: 12px;">&nbsp; &nbsp; &nbsp; &nbsp; <strong>&nbsp; Phòng: {{$data_room->name}} </strong></td>
    </tr>
  </tbody>
</table>

<p><table border="1" style="width:100%;border-collapse:collapse;  " class="thanhtoan">

                    <tbody>
                        <tr>
                            <td style="text-align:center;width: 50%;font-size: 11px;"><strong>Đơn giá</strong></td>

                            <td style=" text-align: center; font-size: 11px;"><strong>SL</strong></td>

                            <td style="width: 25%; text-align: center; font-size: 11px;"><strong>ĐVT</strong></td>
                            <td style=" text-align: center; font-size: 11px;"><strong>CK(%)</strong></td>
                            <td style="text-align:center;width: 15%;font-size: 13px;"><strong>Thành tiền</strong>
                            </td>
                        </tr>
                        @foreach($data_order->detail_order as $item)
                          <tr><td style="text-align:left;"colspan="5"> <span style="font-size: 11px;">{{$item->product->name}}</span></td></tr>
                          <tr>
                            <td style="text-align: center;font-size: 11px;" class="number">{{$item->price->price_sell}}</td>
                            <td style="text-align: center;font-size: 11px; " class="number1">{{$item->number}}</td>
                            <td style="text-align:center;font-size: 11px; ">{{$item->unit->name}}</td>
                             <td style="text-align:center;font-size: 11px; "class="number1">{{$item->discount_product}}</td>
                            <td style="text-align:center;font-size: 11px; " class="thanhtien1">{{$item->number*$item->price->price_sell-$item->number*$item->price->price_sell*(int)$item->discount_product/100}}</td>
                          </tr>
                        @endforeach
                        @foreach($data_timemoney as $value)
                        <tr><td style="text-align:left;"colspan="5"> <span style="font-size: 11px;">Tiền giờ ({{date_format(new DateTime($value->time_start),"H:i")}}->{{date_format(new DateTime($value->time_finish),"H:i")}})</span></td></tr>
                          <tr>
                            <td style="text-align: center;font-size: 11px;" class="number">{{(int)($value->price_time/60)}}</td>
                            <td style="text-align: center;font-size: 11px; " class="number1">
                              <?php
                                   $a=strtotime($value->time_finish)-strtotime($value->time_start);
                                   echo round($a/60);
                               ?>
                              
                            </td>
                            <td style="text-align:center;font-size: 11px; ">Phút</td>
                             <td style="text-align:center;font-size: 11px; "class="number1">{{$value->discount_time}}</td>
                            <td style="text-align:center;font-size: 11px; " class="thanhtien1">{{round($value->price_time/60*round($a/60))-round($value->price_time/60*$a/60*$value->discount_time/100)}}</td>
                          </tr>
                        @endforeach
                    </tbody>

                 </table>

</p>

<table border="0" cellpadding="3" cellspacing="0" style="border-collapse:collapse; margin-top:20px; width:98%">
  <tfoot>
    <tr>
      <td style="text-align:right; white-space:nowrap"><span style="font-size:12px" >Tổng thanh toán:</span></td>
      <td style="text-align:right; font-size:12px;"id="tongcong3" >0</td>
    </tr>
    <tr>
      <td style="text-align:right; white-space:nowrap"><span style="font-size:12px" >Chiết khấu:</span></td>
      <td style="text-align:right; font-size:12px;" id="discount">{{$data_order->discount_order}}</td>
    </tr>
    <tr>
      <td style="text-align:right; white-space:nowrap"><span style="font-size:12px" >VAT:</span></td>
      <td style="text-align:right; font-size:12px;" id="VAT"  >{{$data_order->VAT}}</td>
    </tr>
    <tr>
      <td style="text-align:right; white-space:nowrap"><span style="font-size:12px" >Thanh Toán:</span></td>
      <td style="text-align:right; font-size:12px;"  id="thanhtoan">0</td>
    </tr>
  </tfoot>
</table>
<p style="font-size: 18px; text-align: center;"> Cảm ơn và hẹn gặp lại quý khách</p>
</div>
</div>

</body>
<script type="text/javascript">
  function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
  }
     let v=document.getElementsByClassName("number");
     let vi=document.getElementsByClassName("number1");
     let thanhtien=document.getElementsByClassName("thanhtien1");
     let thanhtien3=0;
    
     for(var i=0;i<v.length;i++){
        v[i].textContent=numberWithCommas(v[i].textContent);
     }
     var total=0;
     for(var i=0;i<thanhtien.length;i++){
        total+=parseInt(thanhtien[i].textContent);
        thanhtien[i].textContent=numberWithCommas(thanhtien[i].textContent);
     }
     var VAT= parseInt(parseInt(document.getElementById('VAT').textContent)*total/100);
     var CK=parseInt(parseInt(document.getElementById('discount').textContent)*total/100)
     document.getElementById('VAT').textContent=numberWithCommas(VAT);

      document.getElementById('discount').textContent=numberWithCommas(CK);
    document.getElementById("tongcong3").textContent=numberWithCommas(total);
      document.getElementById('thanhtoan').textContent=numberWithCommas(total+VAT-CK);
     
</script>
</html>
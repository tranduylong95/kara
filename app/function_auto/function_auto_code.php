<?php
namespace App\function_auto;
Class function_auto_code
{
  public function code_auto($chuoikytu,$data)
  {
    $string_code="";
    foreach ($data as $key => $value) {
    	
    	if(strlen($value->Ma_sp)==8){
    		if(substr($value->Ma_sp,0,2)==$chuoikytu){
                $chuoi_end=substr($value->Ma_sp,2,7);
                if(ctype_digit($chuoi_end)){
                	$number=(int)$chuoi_end;
                	$number=$number+1;
                	$chuoi_end_next="";
                	for ($i=0; $i <strlen($chuoi_end)-strlen((string)$number); $i++) 
                	{ 
                		$chuoi_end_next=$chuoi_end_next."0";
                	}
                	$chuoi_end_next=$chuoi_end_next.(string)$number;
                	$string_code=$chuoikytu.$chuoi_end_next;
                }
                
    		}

    		
    	}
    }
    if(!$string_code){
    	$string_code=$chuoikytu."000001";
    }
    return $string_code;
  }
 public function code_auto_order($chuoikytu,$data)
  {
    $string_code="";
    foreach ($data as $key => $value) {
        
        if(strlen($value->code_order)==8){
            if(substr($value->code_order,0,2)==$chuoikytu){
                $chuoi_end=substr($value->code_order,2,7);
                if(ctype_digit($chuoi_end)){
                    $number=(int)$chuoi_end;
                    $number=$number+1;
                    $chuoi_end_next="";
                    for ($i=0; $i <strlen($chuoi_end)-strlen((string)$number); $i++) 
                    { 
                        $chuoi_end_next=$chuoi_end_next."0";
                    }
                    $chuoi_end_next=$chuoi_end_next.(string)$number;
                    $string_code=$chuoikytu.$chuoi_end_next;
                }
                
            }

            
        }
    }
    if(!$string_code){
        $string_code=$chuoikytu."000001";
    }
    return $string_code;
  }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    public $timestamps = false;
    use SoftDeletes;
    public function Area()
    {
    	return $this->belongsTo(Area::class,'id_area');
    }
    public function PriceTimeRoom(){
    	return $this->belongsTo(PriceTime::class,'id_price_time');
    }
    public function OrderActive(){
        return $this->hasOne(Order::class,'id_room')->where('order.status',1)->latestOfMany();
    }
   
}

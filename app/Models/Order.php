<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    public $timestamps = false;
    public function DetailOrder(){
    	return $this->hasmany(DetailOrder::class,'id_order');
    }
    public function TimeMoney(){
    	return $this->hasmany(TimeMoney::class,'id_order');
    }
    public function room(){
    	return $this->belongsTo(Room::class,'id_room');
    }
    public function Employee(){
    	return $this->belongsTo(Employee::class);
    }

}

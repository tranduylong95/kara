<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='Product';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function category()
    {
    	return $this->belongsTo(Category::class,'id_category');
    }
    public function price(){
    	return $this->hasOne(Price::class,'id','id_price');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'id_dvt');
    }
    public function DetailOrder(){
      $this->belongsToMany(Price::class,DetailOrder::class,'id_product','id_price');
    }
}

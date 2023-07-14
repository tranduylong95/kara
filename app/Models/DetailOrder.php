<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $table = 'detail_order';
    public $timestamps = false;
    
    public function Product()
    {
    	return $this->belongsTo(Product::class,'id_product');
    }
    public function Price()
    {
    	return $this->belongsTo(Price::class,'id_price');
    }
    public function Unit()
    {
    	return $this->belongsTo(Unit::class,'id_dvt');
    }
}

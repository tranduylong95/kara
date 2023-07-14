<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'Category';
    public $timestamps = false;
    
    public function product()
    {
        return $this->hasMany(Product::class,'id_category');
    }
    public function productandprice(){
    	return $this->belongsToMany(Price::class,Product::class,'id_category','id_price')->withPivot('name','id','status','deleted_at','image')->wherePivot('status',1)->wherePivot('deleted_at',null);
    }
}
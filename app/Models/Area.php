<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Area extends Model
{
    use HasFactory;
    protected $table = 'area';
    use SoftDeletes;
    public $timestamps = false;
   
    public function PriceTime()
    {
    	return $this->belongsTo(PriceTime::class,'id_price_time');
    }
    public function Room(){
    	  return $this->hasMany(Room::class,'id_area');
    }
    public function CompanyChild(){
    	return $this->belongsTo(ComPanyChild::class,'id_company_child');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceTime extends Model
{
    use HasFactory;
    protected $table = 'price_time';
    public $timestamps = false;
}

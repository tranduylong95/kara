<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeMoney extends Model
{
    use HasFactory;
    protected $table = 'time_money';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

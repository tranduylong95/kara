<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyChild extends Model
{
    use HasFactory;
    protected $table ='company_child';
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCompanyChild extends Model
{
    use HasFactory;
    protected $table ='employee_company_child';
    public $timestamps = false;
    
    protected $fillable = [
        'id_company_child_','Emplooyee_id',
    ];

}

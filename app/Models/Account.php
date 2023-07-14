<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use Notifiable;
    protected $table ='account';
    protected $fillable = [
        'account_name','password','status'
    ];

    protected $hidden = [
        'password','remember_token'
    ];
    public function getAuthPassword()
    {
      return $this->password;
    }
    public $timestamps = false;

    public function Employee(){
        return $this->hasOne(Employee::class,'id_account');
    }
}

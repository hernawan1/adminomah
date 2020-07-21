<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable=[
        'name','addres','number','email','password','uid','pushtoken','photo','status','jarak','lat','lng'
    ];
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}

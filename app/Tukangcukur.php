<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tukangcukur extends Model
{
   protected $table='tukangcukur';
   protected $fillable=[
       'name','addres','number','email','password','uid','pushtoken','photo','status','jarak','lat','lng'
   ];
   public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}

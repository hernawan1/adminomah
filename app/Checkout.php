<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkout';
    protected $fillable = [
      'idtukang','idcustomer','idmodel','totalharga','tgltransaksi','status','jarak'
    ];
}

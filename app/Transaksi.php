<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
      'idtukang','idcustomer','idmodel','totalharga','tgltransaksi','status' ,'alamat','jarak'
    ];
}

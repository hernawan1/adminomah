<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'promo';
    protected $fillable = [
        'nama','photo','detail','potongan','tglawal','tglakhir'
    ];
}

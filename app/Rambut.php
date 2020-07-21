<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rambut extends Model
{
    protected $table='modelrambut';
    protected $fillable=[
        'nama_model','photo1','photo2','photo3','kategori','jenis_model', 'detail'
    ];
}

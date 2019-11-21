<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id_pembayaran'; //menentuka primary key
    protected $table = 'pembayaran'; //menentukan nama table
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id_transaksi'; //menentuka primary key
    protected $table = 'transaksi'; //menentukan nama table

    public function Meja(){
    	return $this->belongsTo('App\meja','meja_id');
    }

    public function Status_bayar(){
    	return $this->belongsTo('App\Status_bayar','status_bayar_id');
    }

    public function Member(){
    	return $this->belongsTo('App\member','member_id');
    }


    public function Pembayaran(){
    	return $this->belongsTo('App\pembayaran','pembayaran_id');
    }
}

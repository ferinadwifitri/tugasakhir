<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id_detail_transaksi'; //menentuka primary key
    protected $table = 'detail_transaksi'; //menentukan nama table

    public function Transaksi(){
    	return $this->belongsTo('App\transaksi','transaksi_id');
    }

    public function Menu(){
    	return $this->belongsTo('App\menu','menu_id');
    }
}

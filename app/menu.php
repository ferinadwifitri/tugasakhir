<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id_menu'; //menentuka primary key
    protected $table = 'menu'; //menentukan nama table

    // relasi referensi
    public function data_kategori(){
    	return $this->belongsTo('App\kategori','kategori_id');
    }

    // Mengecek relasi
    public function cek_kategori(){
    	$ketemu = false;
    	if($this->data_kategori){
    		$ketemu = true;
    	}

    	return $ketemu;
    }
}

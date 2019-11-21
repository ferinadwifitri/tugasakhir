<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topup extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id_topup'; //menentuka primary key
    protected $table = 'topup'; //menentukan nama table
    protected $fillable = ['nominal','tanggal','member_id'];

    public function Member(){
    	return $this->belongsTo('App\member','member_id');
    }

}

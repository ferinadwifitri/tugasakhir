<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status_bayar extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id'; //menentuka primary key
    protected $table = 'status_bayar'; //menentukan nama table
}

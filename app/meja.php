<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class meja extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'no_meja'; //menentukan primary key
    protected $table = 'meja'; //menentukan nama table
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id_kategori'; //menentukan primary key
    protected $table = 'kategori'; //menentukan nama table
}

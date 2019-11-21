<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id'; //menentuka primary key
    protected $table = 'member'; //menentukan nama table
}

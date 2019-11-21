<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status_order extends Model
{
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id'; //menentuka primary key
    protected $table = 'status_order'; //menentukan nama table
}

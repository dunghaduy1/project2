<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'lop';
    protected $primaryKey = 'ma_lop';

    public $timestamps = false;
}

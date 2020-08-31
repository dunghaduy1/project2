<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'sinh_vien';
    protected $primaryKey = 'ma_sinh_vien';
    protected $fillable = [
    	'ten',
    	'email',
    	'so_dien_thoai',
    	'ngay_sinh',
    	'gioi_tinh',
    	'trang_thai',
    	'ma_lop',
    ];

    public $timestamps = false;
}

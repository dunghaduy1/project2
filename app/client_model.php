<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class client_model extends Model
{	
	  static function get_sinh_vien_by_email_sdt($email,$so_dien_thoai){
	    $sinh_vien = DB::select("select * from sinh_vien where email = ? and so_dien_thoai = ?",[
	      $email,
	      $so_dien_thoai,
	    ]);
	    return $sinh_vien;
	  }
 	static function get_diem_by_email_sdt($email,$so_dien_thoai){
    $diem = DB::select("SELECT mon_hoc.ten_mon as mon_hoc,
                              diem.diem_lan_mot as diem_lan_mot,
                              diem.diem_lan_hai as diem_lan_hai,
                              diem.kieu_thi as kieu_thi 
                      FROM (sinh_vien LEFT JOIN lop ON sinh_vien.ma_lop = lop.ma_lop)
                      INNER JOIN diem ON sinh_vien.ma_sinh_vien = diem.ma_sinh_vien
                      INNER JOIN mon_hoc ON diem.ma_mon = mon_hoc.ma_mon
                      WHERE sinh_vien.email=? and sinh_vien.so_dien_thoai=?
                      ORDER BY mon_hoc.ten_mon",[
      $email,
      $so_dien_thoai
    ]);
    return $diem;
  }
}

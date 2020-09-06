<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class sinh_vien_model extends Model
{
 	public $ma_sinh_vien;
 	public $ten;
 	public $email;
 	public $ngay_sinh;
 	public $so_dien_thoai;
 	public $gioi_tinh;
 	public $ma_lop;
 	public $trang_thai;
 	public $sinh_vien;
 	static function get_all(){
 		$sinh_vien = DB::Select('Select * from sinh_vien');
 		return $sinh_vien;
 	}
 	public function process_insert(){
 		DB::insert("INSERT INTO sinh_vien (ten,email,ngay_sinh,so_dien_thoai,gioi_tinh,ma_lop,trang_thai) VALUES (?,?,?,?,?,?,?)",[
 			$this->ten,
 			$this->email,
 			$this->ngay_sinh,
 			$this->so_dien_thoai,
 			$this->gioi_tinh,
 			$this->ma_lop,
 			$this->trang_thai
 		]);
 	}
  static function get_lop(){
    $lop=DB::Select("Select * FROM lop ");
    return $lop;
  }
  static function get_khoa(){
    $khoa=DB::Select("Select * FROM khoa ");
    return $khoa;
  }
    static function get_nganh(){
    $nganh=DB::Select("Select * FROM nganh ");
    return $nganh;
  }
  static function get_lop_by_nganh_khoa($ma_khoa,$ma_nganh){
    $lop = DB::select("select * from lop where ma_khoa = ? and ma_nganh = ?",[
      $ma_khoa,
      $ma_nganh
    ]);
    return $lop;
  }
  static function kt_email($email){
      $email=DB::Select("Select * FROM sinh_vien where email=? ",[
        $email
      ]);
      return $email;
    }
    static function kt_sdt($so_dien_thoai){
      $so_dien_thoai=DB::Select("Select * FROM sinh_vien where so_dien_thoai=? ",[
        $so_dien_thoai
      ]);
      return $so_dien_thoai;
    }
static function get_sinh_vien_by_lop($ma_lop){
    $sinh_vien = DB::select("select * from sinh_vien where ma_lop = ?",[
      $ma_lop
    ]);
    return $sinh_vien;
  }
 	static function get_one($ma_sinh_vien){
 		$sinh_vien = DB::Select("Select * FROM sinh_vien where ma_sinh_vien = ?",[
 			$ma_sinh_vien
 		]);
 		return $sinh_vien;
 	}
 	 public function process_update(){
    	DB::update("update sinh_vien set ten=?,email=?,ngay_sinh=?,so_dien_thoai=?,gioi_tinh=?,ma_lop=? where ma_sinh_vien=?",[
    		$this->ten,
 			$this->email,
 			$this->ngay_sinh,
 			$this->so_dien_thoai,
 			$this->gioi_tinh,
 			$this->ma_lop,
     		$this->ma_sinh_vien

    	]);
    }
    public function process_delete(){
   		DB::delete("delete from sinh_vien where ma_sinh_vien=?",[
   			$this->ma_sinh_vien
   		]);
   	}
}

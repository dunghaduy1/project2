<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class diem_model extends Model
{
    public $diem;
    public $lan;
    public $diem_lan_mot;
    public $diem_lan_hai;
    public $lan_thi;
    public $khoa;
    public $nganh;
    public $lop;
    public $mon;
    public $kieu_thi;
    static function get_all(){
    	$diem = DB::select('SELECT * FROM `sinh_vien` JOIN `diem` ON sinh_vien.ma_sinh_vien=diem.ma_sinh_vien');
    	return $diem;
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
  static function get_mon_by_nganh($ma_nganh){
    $mon = DB::select("select * from mon_hoc where ma_nganh = ?",[
      $ma_nganh
    ]);
    return $mon;
  }
  static function get_mon(){
    $mon=DB::Select("Select * FROM mon_hoc ");
    return $mon;
  }
  static function get_diem_by_lop_mon($ma_lop,$ma_mon,$kieu_thi){
    $diem = DB::select("SELECT sinh_vien.ma_sinh_vien as ma_sinh_vien,
                              sinh_vien.ten as ten,
                              sinh_vien.ngay_sinh as ngay_sinh,
                              diem.diem_lan_mot as diem_lan_mot,
                              diem.diem_lan_hai as diem_lan_hai
                      FROM (sinh_vien LEFT JOIN lop ON sinh_vien.ma_lop = lop.ma_lop)
                      INNER JOIN diem ON sinh_vien.ma_sinh_vien = diem.ma_sinh_vien
                      INNER JOIN mon_hoc ON diem.ma_mon = mon_hoc.ma_mon
                      WHERE lop.ma_lop=? and mon_hoc.ma_mon=? and diem.kieu_thi=?",[
      $ma_lop,
      $ma_mon,
      $kieu_thi
    ]);
    return $diem;
  }
  static function get_sv_by_lop($ma_lop){
    $sinh_vien = DB::select("SELECT sinh_vien.ma_sinh_vien,
                                    sinh_vien.ten,
                                    sinh_vien.ngay_sinh,
                                    lop.ma_lop 
                        FROM sinh_vien INNER JOIN lop ON sinh_vien.ma_lop=lop.ma_lop
                        WHERE lop.ma_lop=?",[
      $ma_lop
    ]);
    return $sinh_vien;
  }
    public function process_insert(){
    DB::connection()->enableQueryLog();
    DB::insert("INSERT INTO diem (diem_lan_mot,diem_lan_hai,kieu_thi,ma_sinh_vien,ma_mon) 
                VALUES (?,?,?,?,?)",[
      $this->diem_lan_mot,
      $this->diem_lan_hai,
      $this->kieu_thi,
      $this->ma_sinh_vien,
      $this->ma_mon,
    ]);
  }
  public function update_diem_mot(){
    DB::update("update diem set diem_lan_mot=? where ma_sinh_vien=? and ma_mon=? and kieu_thi=?",[
        $this->diem,
        $this->ma_sinh_vien,
        $this->ma_mon,
        $this->kieu_thi,
      ]);
  }
  public function update_diem_hai(){
    DB::update("update diem set diem_lan_hai=? where ma_sinh_vien=? and ma_mon=? and kieu_thi=?",[
        $this->diem,
        $this->ma_sinh_vien,
        $this->ma_mon,
        $this->kieu_thi,
      ]);
  }
}
